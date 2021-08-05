<template>
    <section class="my-5">
        <h1>Contattaci</h1>

        <div v-show="success" class="alert alert-success">Messaggio ricevuto correttamente!<br>Ti risponderemo appena possibile.</div>

        <form @submit.prevent="sendForm">
            
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Inserisci il tuo indirizzo nome" v-model="name" :class="{ 'is-invalid': errors.name }">
                <small class="text-danger" v-for="(error, index) in errors.name" :key="`err-name-${index}`">{{ error }}</small>
            </div>

            <div class="form-group">
                <label for="email">Indirizzo email</label>
                <input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp" placeholder="Inserisci il tuo indirizzo email" v-model="email" :class="{ 'is-invalid': errors.email }">
                <small class="text-danger" v-for="(error, index) in errors.email" :key="`err-email-${index}`">{{ error }}</small>
            </div>

            <div class="form-group">
                <label for="message">Messaggio</label>
                <textarea name="message" class="form-control" id="message" rows="5" placeholder="Inserisci un messaggio di testo" v-model="message" :class="{ 'is-invalid': errors.message }"></textarea>
                <small class="text-danger" v-for="(error, index) in errors.message" :key="`err-message-${index}`">{{ error }}</small>
            </div>

            <button :disabled="sending" type="submit" class="btn btn-primary">{{ sending ? 'Invio in corso...' : 'Invia' }}</button>
        </form>
    </section>
</template>

<script>
export default {
    name: "Contact",
    data: function() {
        return {
            name: '',
            email: '',
            message: '',
            errors: {},
            success: false,
            sending: false
        }
    },
    methods: {
        sendForm: function() {
            this.sending = true;

            axios
                .post('http://127.0.0.1:8000/api/leads', {
                    name: this.name,
                    email: this.email,
                    message: this.message,
                })
                .then(
                    res => {
                        this.sending = false;

                        console.log(res.data);
                        if (res.data.errors) {
                            this.errors = res.data.errors;
                            this.success = false;
                        } else {
                            this.name = '';
                            this.email = '';
                            this.message = '';
                            this.errors = {};
                            this.success = true;
                        }
                    }
                )
                .catch(
                    err => {
                        console.log(err);
                    }
                );
        }
    }
}
</script>

<style>

</style>