<template>

        <div class="collection-item">
            <div class="input-field col s12">
                <input type="text" v-model="title" @keydown="editingNote">
                <label for="title">Give your note a Title</label>
            </div>

            <div class="input-field col s12">
                <textarea class="materialize-textarea" v-model="body" @keydown="editingNote"></textarea>
                <label for="body">...and here goes your Note Body</label>
            </div>

            <button class="waves-effect waves-teal green btn pull-right" @click="updateNote"><i class="large material-icons right">save</i> save</button>
            <div>
            <p>
                Users editing this note:<span>{{ usersEditing.length }}</span>
                <span style="padding:5px" class="waves-effect waves-light green black-text" v-text="status"></span>
            </p>
        </div>
        </div>
</template>

<script>
    export default {
        props: [
            'note',
        ],

        data() {
            return {
                title: this.note.title,
                body: this.note.body,
                usersEditing: [],
                status: ''
            }
        },

        mounted() {
            Echo.join(`note.${this.note.slug}`)
                .here(users => {
                    this.usersEditing = users;
                })
                .joining(user => {
                    this.usersEditing.push(user);
                })
                .leaving(user => {
                    this.usersEditing = this.usersEditing.filter(u => u != user);
                })
                .listenForWhisper('editing', (e) => {
                    this.title = e.title;
                    this.body = e.body;
                })
                .listenForWhisper('saved', (e) => {
                    this.status = e.status;

                    // clear is status after 1s
                    setTimeout(() => {
                        this.status = '';
                    }, 1000);
                });
        },

        methods: {
            editingNote() {
                let channel = Echo.join(`note.${this.note.slug}`);

                // show changes after 1s
                setTimeout(() => {
                    channel.whisper('editing', {
                        title: this.title,
                        body: this.body
                    });
                }, 1000);
            },

            updateNote() {
                let note = {
                    title: this.title, 
                    body:  this.body
                };

                // persist to database
                axios.patch(`/edit/${this.note.slug}`, note)
                    .then(response => {
                        // show saved status
                        this.status = response.data;
                         
                        // clear is status after 1s
                        setTimeout(() => {
                            this.status = '';
                        }, 1000);

                        // show saved status to others
                        Echo.join(`note.${this.note.slug}`)
                            .whisper('saved', {
                                status: response.data
                            });
                    });
            }
        }
    }
</script>
