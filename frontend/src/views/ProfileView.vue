<script setup>
import LinkComponent from "../components/LinkComponent.vue";
import updateLinkComponent from "../components/updateLinkComponent.vue";
import axios from "axios";
import { onMounted, ref } from "vue";
import newLinkForm from "../components/newLinkForm.vue";

import { useUserStore } from "../stores/userStore";
const store = useUserStore();

const links = ref([]);
const user = ref({});
const showPlusLink = ref(false);
const showLinkSettings = ref(false);
const showEdit = ref(false);
const showEditFormVar = ref(false);
const IdLinkProp = ref();

onMounted(async () => {
	const response = await axios.get("/api/user");
	user.value = response.data;
	const response_links = await axios.get(`/api/get_links/${user.value.id}`);
	links.value = response_links.data;
	links.value = links.value.links;
	store.changeId(user.value.id);
	store.changeLogState();
	console.log(store.id);
});

const showForm = () => {
	showPlusLink.value = !showPlusLink.value;
};

const changeEdit = () => {
	showEdit.value = !showEdit.value;
};

const showEditForm = () => {
	showEditFormVar.value = !showEditFormVar.value;
};

const handleID = (id) => {
	IdLinkProp.value = id;
	console.log(IdLinkProp.value);
};
</script>

<template>
	<div class="bg-gray-900 text-white min-h-screen flex justify-center">
		<div class="w-[550px] mx-auto py-8 px-4">
			<div class="flex flex-col items-center gap-6">
				<h1
					v-if="user.id !== store.id"
					class="font-semibold text-2xl text-center mt-16"
				>
					U are not logged in.
				</h1>
			</div>
			<div v-if="user.id === store.id">
				<h1 class="text-2xl font-semibold text-center mb-8">
					{{ user.name }} {{ user.surename }}
				</h1>
				<button
					v-if="user.id === store.id"
					@click="changeEdit"
					class="w-full bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 focus:outline-none focus:bg-blue-600 mb-4"
				>
					Edit
				</button>
				<img
					class="mb-5 mx-auto w-60 h-60"
					:src="user.image_source"
					alt="logo"
				/>
				<p class="text-center font-medium mb-7 text-slate-400">
					{{ user.bio }}r
				</p>
				<div class="flex flex-col">
					<LinkComponent
						v-for="link in links"
						:key="link.id"
						:link="link"
						:showEdit="showEdit"
						@editLink="showEditForm"
						@ID="handleID"
					/>
				</div>
				<button
					@click="showForm"
					class="w-full bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600 focus:outline-none focus:bg-blue-600 mb-4 font-semibold text-xl"
				>
					+
				</button>
			</div>
		</div>
	</div>
	<newLinkForm v-if="showPlusLink" @showForm="showForm" />
	<updateLinkComponent
		v-if="showEditFormVar"
		:IdLinkProp="IdLinkProp"
		@showEditForm="showEditForm"
	/>
</template>

<style scoped></style>
