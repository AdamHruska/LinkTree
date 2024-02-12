<script setup>
import axios from 'axios';
import { ref } from 'vue';
import { useUserStore } from '../stores/userStore';

const store = useUserStore();

const emit = defineEmits(['showForm']);

const form = ref({
  link: '',
  link_name: '',
  link_logo: ''
});

const handleNewLink = async () => {
  try {
    const response = await axios.post('/api/new_link', {
      user_id: store.id,
      link: form.value.link,
      link_name: form.value.link_name,
      link_logo: form.value.link_logo
    });
    console.log(response.data);
  } catch (error) {
    console.error(error);
  }
  emit('showForm');
}
</script>

<template>
  <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
    <div class="bg-gray-900 p-8 rounded-lg shadow-lg w-[400px]">
      <h2 class="text-2xl font-semibold mb-4 text-center text-white">Form Title</h2>
      <form @submit.prevent>
        <div class="mb-4">
          <label class="block mb-2">Link</label>
          <input v-model="form.link" type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
          <label class="block mb-2">Link Name</label>
          <input v-model="form.link_name" type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
          <label class="block mb-2">Link Logo</label>
          <input v-model="form.link_logo" type="text" class="w-full px-4 py-2 bg-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500">
        </div>
        <button @click="handleNewLink" class="font-semibold mt-2 w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200">Add Link</button>
      </form>
    </div>
  </div>
</template>
