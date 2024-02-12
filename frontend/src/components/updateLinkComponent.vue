<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";

const emit = defineEmits(["showEditForm"]);
const props = defineProps(["IdLinkProp"]);

const form = ref({
	link: "",
	link_name: "",
	link_logo: "",
});

onMounted(async () => {
	const response = await axios.get(`/api/get_link/${props.IdLinkProp}`);
	form.value = response.data;
	console.log(form.value);
});

const handleUpdate = () => {
	//ak to nepojde vratit emit na click do buttonu
	axios.post(`/api/update_link/${props.IdLinkProp}`, {
		link: form.value.link,
		link_name: form.value.link_name,
		link_logo: form.value.link_logo,
	});
	emit("showEditForm");
};
</script>

<template>
	<div
		class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50"
	>
		<div class="bg-gray-900 p-8 rounded-lg shadow-lg w-[400px]">
			<h2 class="text-2xl font-semibold mb-4 text-center text-white">
				Edit Link
			</h2>
			<form @submit.prevent="handleUpdate">
				<div class="mb-4">
					<label class="block mb-2">Link</label>
					<input
						v-model="form.link"
						type="text"
						class="w-full px-4 py-2 bg-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
					/>
				</div>
				<div class="mb-4">
					<label class="block mb-2">Link Name</label>
					<input
						v-model="form.link_name"
						type="text"
						class="w-full px-4 py-2 bg-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
					/>
				</div>
				<div class="mb-4">
					<label class="block mb-2">Link Logo</label>
					<input
						v-model="form.link_logo"
						type="text"
						class="w-full px-4 py-2 bg-gray-900 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500"
					/>
				</div>
				<button
					type="submit"
					@click=""
					class="font-semibold mt-2 w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200"
				>
					Confirm Edit
				</button>
			</form>
		</div>
	</div>
</template>
