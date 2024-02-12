<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import ProfileCard from "../components/ProfileCardComponent.vue";
const users = ref([]);
onMounted(async () => {
	const response = await axios.get("/api/get_users");
	users.value = response.data;
	console.log(users.value[0].id);
});
</script>

<template>
	<div class="bg-gray-900 text-white min-h-screen flex justify-center">
		<div class="max-w-4xl w-full py-8 px-4">
			<div
				class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4"
			>
				<ProfileCard v-for="user in users" :key="user.id" :user="user" />
			</div>
		</div>
	</div>
</template>
