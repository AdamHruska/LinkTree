<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import { useRoute } from "vue-router";
import LinkComponent from "../components/LinkComponent.vue";

const route = useRoute();
const id = route.params.id;

const user = ref([]);
const links = ref([]);

onMounted(async () => {
	const response = await axios.get(`/api/get_user/${id}`);
	user.value = response.data;
	const response_links = await axios.get(`/api/get_links/${id}`);
	links.value = response_links.data;
	links.value = links.value.links;
	console.log(links.value);
});
</script>

<template>
	<div class="bg-gray-900 text-white min-h-screen flex justify-center">
		<div class="w-[550px] mx-auto py-8 px-4">
			<h1 class="text-2xl font-semibold text-center mb-8">
				{{ user.name }} {{ user.surename }}
			</h1>
			<img class="mb-5 mx-auto w-60 h-60" :src="user.image_source" alt="logo" />
			<p class="text-center font-medium mb-7 text-slate-400">{{ user.bio }}r</p>
			<div class="flex flex-col">
				<h3
					v-if="!links.length"
					class="text-white font-semibold text-center mt-6"
				>
					User does not have any Links yet.
				</h3>
				<LinkComponent
					v-if="links.length > 0"
					v-for="link in links"
					:key="link.id"
					:link="link"
				/>
			</div>
		</div>
	</div>
</template>
