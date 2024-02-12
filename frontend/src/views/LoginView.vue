<script setup>
import {RouterLink, useRouter} from 'vue-router'
import { ref } from 'vue'
import axios from 'axios'

import { useUserStore } from '../stores/userStore';
const store = useUserStore()

const form = ref({
    email: '',
    password: ''
})
const router = useRouter()
const handleLogin = async () => {
    await axios.post('/login', {
        email: form.value.email,
        password: form.value.password
    })
    router.push('/profile')
}

const logout = async () => {
    await axios.post('/logout')
    store.changeId(0)
    store.changeLogState()
}
</script>

<template>
    <body class="bg-gray-900 text-white min-h-screen flex justify-center">
    <div class="mx-auto p-8 mt-8">
        <h1 class="text-3xl font-semibold text-center mb-10">Login</h1>
        <form @submit.prevent="handleLogin" class="space-y-4">
            <div>
                <label class="">Email</label>
                <input v-model="form.email" type="emial" class="w-full bg-gray-800 border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <div>
                <label class="">Password</label>
                <input v-model="form.password" type="password" class="w-full bg-gray-800 border border-gray-700 rounded-md px-4 py-2 focus:outline-none focus:border-blue-500">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Login</button>
        </form>
        <div class="text-center mt-4 mb-1">
            <router-link to="/" class="text-center hover:underline hover:text-blue-500 font-medium text-sm">Forgot Password?</router-link>
        </div>
        <div class="flex justify-center gap-2">
            <p class="text-sm text-slate-200 font-medium">Not registered yet?</p>
            <router-link to="/register" class="text-blue-500 hover:underline font-semibold">Sign Up</router-link>
        </div>
    </div>
    <button @click="logout">logout</button>
</body>
</template>