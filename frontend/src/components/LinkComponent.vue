<script setup>
import { RouterLink } from "vue-router";

const props = defineProps(["link", "showEdit"]);

const emit = defineEmits(["editLink"]);

const emitFunc = () => {
	emit("ID", props.link.id);
	emit("editLink");
};
</script>

<template>
	<!-- <a :href="link.link" target="_blank" 
                     class="bg-gray-800 rounded-lg shadow-md p-4 mb-6 
                     text-blue-500 font-semibold hover:underline flex">
    <img class="h-7 w-7 ml-1 absolute" :src="link.link_logo" alt="logo">  
    <h2 class="font-semibold text-lg ml-[217px]">{{ link.link_name }}</h2>
    <button v-if="showEdit" @click.prevent="$emit('editLink')" class="bg-blue-500 text-white rounded-md px-3 py-1 ml-auto">
        edit
    </button>
</a> -->

	<a
		:href="link.link"
		target="_blank"
		class="bg-gray-800 rounded-lg shadow-md p-4 mb-6 text-blue-500 font-semibold hover:underline flex"
	>
		<img class="h-7 w-7 ml-1 absolute" :src="link.link_logo" alt="logo" />
		<h2 class="font-semibold text-lg ml-[217px]">{{ link.link_name }}</h2>
		<button
			v-if="showEdit"
			@click.prevent="emitFunc"
			class="bg-blue-500 text-white rounded-md px-3 py-1 ml-auto"
		>
			edit
		</button>
	</a>
</template>
