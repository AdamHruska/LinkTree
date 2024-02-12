import { defineStore } from 'pinia'

export const useUserStore = defineStore('user', {
  state: () => ({
    isLoggedIn: false,
    id: 0,
  }),
  
  actions: {
    changeLogState() {
      this.isLoggedIn = !this.isLoggedIn;
    },

    changeId(id) {
      this.id = id
    }
  },
});
