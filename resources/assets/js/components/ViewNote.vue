<!--<template>
    <div class="panel panel-default">
        <div class="panel-heading">View Note</div>
        <div class="panel-body">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title" v-model="title"></h4>
                <p class="card-text" v-model="body"></p>
              </div>
            </div>
        </div>
    </div>
</template>
-->
<template>
<div class="collection-item">
    <div class="row">
        <div class="col s12 m12">
          <div class="card blue darken-1">
            <div class="card-content white-text">
              <span class="card-title">{{ title }}</span>
              <p><xmp style="white-space: pre-wrap">{{ body }}</xmp></p>
            </div>
           
          </div>
        </div>
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
                id:this.note.id,
                title: this.note.title,
                body: this.note.body,
                user_id: this.note.user_id,
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
        }
    }
</script>
