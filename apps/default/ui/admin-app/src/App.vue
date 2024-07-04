<script setup lang="ts">
import { ref, onMounted } from 'vue'
import { RouterView } from 'vue-router'
import { LocalStorageHelper } from './models/helper/LocalStorageHelper'

const API_URL = 'http://localhost/api/config'

const appConfig: any = ref({})
const isLoading = ref(true)

onMounted(async () => {
  appConfig.value = await (await fetch(API_URL)).json()
  isLoading.value = false
  document.title = appConfig.value.config.appName
  LocalStorageHelper.setItem('config', appConfig.value.config)
})
</script>

<template>
  <RouterView v-if="!isLoading" />
</template>
