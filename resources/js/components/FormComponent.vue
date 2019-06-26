<template>
    <div class="card">
        <div class="card-header">Qual mensagem você quer deixar para as pessoas?</div>
        <div class="card-body">            
            <form action="" v-on:submit.prevent="novaMensagem()">
                <div class="form-group">
                    <label for="mensagem">Esta mensagem chegou agora pra você</label>
                    <input type="text" name="mensagem"  class="form-control" v-model="description">
                </div>
                <button type="submit" class="btn btn-primary">Enviar Pensamento</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                description:''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            novaMensagem(){
                const params = {
                    description:this.description
                };
                this.description = '';
                axios.post('/mensagens', params).then((response)=> {
                    const mensagem = response.data;
                    this.$emit('new',mensagem);                    
                }); 
                
            }
        },
    }
</script>
