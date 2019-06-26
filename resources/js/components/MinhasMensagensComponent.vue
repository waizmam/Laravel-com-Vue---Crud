<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form-component @new="addMensagem"></form-component>
            <br>            
            <mensagem-component 
                v-for="(mensagem, index) in mensagens" 
                :key="mensagem.id" 
                :mensagem="mensagem"
                @update="updateMensagem(index)"
                @delete="deleteMensagem(index)">
            </mensagem-component>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                mensagens:[]                   
            }
        },
        mounted() {
            axios.get('/mensagens').then((response)=>{
                this.mensagens = response.data;
            });
        },
        methods: {
            addMensagem(mensagem){
                this.mensagens.push(mensagem);
            },

            deleteMensagem(index){
                this.mensagens.splice(index,1);
            },

            updateMensagem(index,mensagem){
                this.mensagens[index] = mensagem;
            }
        },
    }
</script>
