<script setup>
import { RouterLink, RouterView } from "vue-router";
import NavBarComponent from "./components/NavBarComponent.vue";
</script>

<template>
	<div class="min-h-screen">
		<NavBarComponent />
		<RouterView />
	</div>
</template>

<style scoped></style>
