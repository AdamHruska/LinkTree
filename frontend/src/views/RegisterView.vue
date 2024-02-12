<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useRouter } from 'vue-router'

const router = useRouter()

const form = ref({
    name: '',
    surname: '',
    email: '',
    password: '',
    passwordConfirmation: ''
})

const handleRegister = async () => {
    await axios.post('/register', {
        name: form.value.name,
        surename: form.value.surname,
        email: form.value.email,
        password: form.value.password,
        password_confirmation: form.value.passwordConfirmation
    })
    router.push('/profile')
}

</script>

<template>
    <body class="bg-gray-900 text-white min-h-screen justify-center">
    <div class="max-w-md mx-auto p-8">
        <h1 class="text-3xl font-semibold text-center mb-8 mt-8">Register</h1>
        <form @submit.prevent="handleRegister" class="space-y-4">
            <div class="flex flex-col">
                <label class="">Name</label>
                <input v-model="form.name" type="text" class="bg-gray-800 border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div class="flex flex-col">
                <label>Surname</label>
                <input v-model="form.surname" type="text" class="bg-gray-800 border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div  class="flex flex-col">
                <label>Email</label>
                <input v-model="form.email" type="email" class="bg-gray-800 border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div  class="flex flex-col">
                <label>Password</label>
                <input v-model="form.password" type="password" class="bg-gray-800 border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div  class="flex flex-col">
                <label>Password Confirmation</label>
                <input v-model="form.passwordConfirmation" type="password" class="bg-gray-800 border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Register</button>
        </form>
    </div>
</body>
</template>