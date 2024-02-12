import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import ProfileView from "../views/ProfileView.vue";
import LoginView from "../views/LoginView.vue";
import RegisterView from "../views/RegisterView.vue";
import newLinkForm from "../components/newLinkForm.vue";
import UsersView from "../views/UsersView.vue";

const router = createRouter({
	history: createWebHistory(import.meta.env.BASE_URL),
	routes: [
		{
			path: "/",
			name: "loign",
			component: LoginView,
		},
		{
			path: "/register",
			name: "register",
			component: RegisterView,
		},
		{
			path: "/profile",
			name: "profile",
			component: ProfileView,
		},
		{
			path: "/new",
			name: "new",
			component: newLinkForm,
		},
		{
			path: "/users",
			name: "users",
			component: UsersView,
		},
	],
});

export default router;
