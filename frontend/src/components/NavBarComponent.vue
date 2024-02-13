<script setup>
import { useUserStore } from "../stores/userStore";
const store = useUserStore();

import axios from "axios";
//import router from "@/router";
import { ref } from "vue";
import { useRouter } from "vue-router";
const router = useRouter();

const isMenuOpen = ref(false);

const toggleMenu = () => {
	isMenuOpen.value = !isMenuOpen.value;
};

const logout = async () => {
	await axios.post("/logout");
	store.changeId(0);
	store.changeLogState();
	router.push("/");
};
</script>

<template>
	<div class="bg-gray-900 text-white">
		<!-- Navigation Bar -->
		<nav class="flex items-center justify-between bg-gray-800 px-4 py-4">
			<!-- Left Menu (Expandable on Phones) -->
			<div class="flex items-center">
				<button
					@click="toggleMenu"
					class="block lg:hidden text-gray-400 hover:text-white focus:outline-none focus:text-white"
				>
					<svg
						class="h-6 w-6"
						fill="none"
						viewBox="0 0 24 24"
						stroke="currentColor"
					>
						<path
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							d="M4 6h16M4 12h16m-7 6h7"
						></path>
					</svg>
				</button>
				<div class="hidden lg:flex space-x-4">
					<router-link
						to="/"
						@click="toggleMenu"
						class="text-white hover:bg-gray-700 px-3 py-2 rounded"
						>Login</router-link
					>
					<router-link
						to="/register"
						@click="toggleMenu"
						class="text-white hover:bg-gray-700 px-3 py-2 rounded"
						>Register</router-link
					>
					<router-link
						to="/profile"
						@click="toggleMenu"
						class="text-white hover:bg-gray-700 px-3 py-2 rounded"
						>Profile</router-link
					>
					<router-link
						to="/users"
						@click="toggleMenu"
						class="text-white hover:bg-gray-700 px-3 py-2 rounded"
						>Users</router-link
					>
				</div>
			</div>

			<div class="flex items-center">
				<button
					@click="toggleMenu"
					class="block lg:hidden text-gray-400 hover:text-white focus:outline-none focus:text-white"
				></button>
				<transition name="menu-expand">
					<div
						v-if="isMenuOpen"
						class="lg:hidden absolute bg-gray-800 w-full left-0 mt-24 py-2 shadow-2xl"
					>
						<router-link
							to="/"
							@click="toggleMenu"
							class="block text-white hover:bg-gray-700 px-3 py-2 rounded font-semibold"
							>Login</router-link
						>

						<router-link
							to="/register"
							@click="toggleMenu"
							class="block text-white hover:bg-gray-700 px-3 py-2 rounded font-semibold"
							>Register</router-link
						>

						<router-link
							to="/profile"
							@click="toggleMenu"
							class="block text-white hover:bg-gray-700 px-3 py-2 rounded font-semibold"
							>Profile</router-link
						>

						<router-link
							to="/users"
							@click="toggleMenu"
							class="block text-white hover:bg-gray-700 px-3 py-2 rounded font-semibold"
							>Users</router-link
						>
					</div>
				</transition>
			</div>

			<!-- Logo -->
			<div class="flex items-center">
				<div
					v-if="store.id !== 0"
					class="block hover:bg-gray-700 px-3 py-2 rounded font-semibold lg:text-lg text-md text-red-500 mr-3"
					@click="logout"
				>
					Logout
				</div>
				<img
					src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/1024px-Vue.js_Logo_2.svg.png"
					alt="Logo"
					class="h-8 lg:hidden"
				/>
				<img
					src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Vue.js_Logo_2.svg/1024px-Vue.js_Logo_2.svg.png"
					alt="Logo"
					class="hidden lg:block h-10"
				/>
			</div>
		</nav>
	</div>
</template>

<style>
.menu-expand-enter-active,
.menu-expand-leave-active {
	transition: all 0.3s ease;
}
.menu-expand-enter,
.menu-expand-leave-to {
	opacity: 0;
	transform: translateY(-20px);
}
</style>
