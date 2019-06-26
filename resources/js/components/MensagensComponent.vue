<template>
    <div class="card">
        <div class="card-header">Publicado em {{ mensagem.created_at }} última atualziação : {{ mensagem.updated_at }}</div>
        <div class="card-body">   

            <input v-if="editMode" type="text" class="form-control" v-model="mensagem.description">
            <p v-else >{{mensagem.description}}</p>      
            
                        
        </div>
        <div class="card-footer">
            <button v-if="editMode" class="btn btn-primary" v-on:click="msgUpdate()">Salvar Mensagem</button>
            <button v-else class="btn btn-warning" v-on:click="msgEdit()">Editar</button>
            <button class="btn btn-danger" v-on:click="msgDelete()">Excluir</button>
        </div>
    </div>
</template>

<script>   
    export default {
        props:['mensagem'],
        data() {
            return {
               editMode:false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            msgDelete(){
                axios.delete(`/mensagens/${this.mensagem.id}`).then(()=>{                     
                    this.$emit('update', mensagem);
                });
                this.$emit('delete');
            },
            msgEdit(){
                this.editMode = true;
                this.$emit('edit');
            },
            msgUpdate(){
                const params = {
                    description:this.mensagem.description
                };
                axios.put(`/mensagens/${this.mensagem.id}`,params).then((response)=>{
                    this.editMode = false;
                    const mensagem = response.data;
                    this.$emit('update', mensagem);
                });
                
            }
        },
    }
</script>
