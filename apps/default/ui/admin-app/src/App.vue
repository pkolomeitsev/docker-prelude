<script setup lang="ts">
import { ref, onMounted } from 'vue'
import HomePage from './components/HomePage.vue'

const API_URL = 'http://localhost/api.php'

const appConfig:any = ref({})
const isLoading = ref(true)

onMounted(async () => {
  appConfig.value = await (await fetch(API_URL)).json()
  isLoading.value = false
  document.title = appConfig.value.config.appName
})
</script>

<template>
  <HomePage v-if="!isLoading" :appConfig="appConfig.config" />
</template>
