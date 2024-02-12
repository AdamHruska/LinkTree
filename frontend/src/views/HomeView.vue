<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';
import { RouterLink, useRouter } from 'vue-router'

const router = useRouter()

const user = ref({});

onMounted(async () => {
  const response = await axios.get('/api/user')
  user.value = response.data
  console.log(user.value)
})

const logout = async () => {
  await axios.post('/logout')
  user.value = null
}

</script>

<template>
  <main>
    {{ user?.name }}
    {{ user?.email }}
    <button @click="logout">Logout</button>
  </main>
</template>
