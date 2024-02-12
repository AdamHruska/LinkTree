<script setup>
const props = defineProps(["user"]);
</script>

<template>
	<div class="bg-gray-800 rounded-lg p-6">
		<img
			class="mx-auto w-40 h-40 rounded-full mb-4"
			:src="user.image_source"
			alt="Profile Image"
		/>
		<h2 class="text-2xl font-semibold text-center">
			{{ user.name }} {{ user.surename }}
		</h2>
		<p class="text-center text-sm text-gray-400 mb-4">{{ user.bio }}</p>
		<button
			class="w-full bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 focus:outline-none focus:bg-blue-600 mb-2"
		>
			Edit Profile
		</button>
	</div>
</template>
