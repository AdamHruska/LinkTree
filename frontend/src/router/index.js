import { createRouter, createWebHistory } from "vue-router";
import ProfileView from "../views/ProfileView.vue";
import LoginView from "../views/LoginView.vue";
import RegisterView from "../views/RegisterView.vue";
import newLinkForm from "../components/newLinkForm.vue";
import UsersView from "../views/UsersView.vue";
import unLoggedInProfileView from "../views/unLoggedProfileVIew.vue";

const router = createRouter({
	history: createWebHistory(import.meta.env.BASE_URL),
	routes: [
		{
			path: "/",
			name: "login",
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
		{
			path: "/profile/:id",
			name: "unLoggedProfileView",
			component: unLoggedInProfileView,
		},
	],
});

export default router;
