<script setup lang="ts">
import { ref } from 'vue'
const date = ref(new Date(Date.now()).getFullYear())
</script>
<template>
  <!--Footer-->
  <footer class="mt-auto border-t bg-gray-100 py-4">
    <div class="container mx-auto w-full px-4">
      &copy; {{ date }} All rights reserved - your localhost
    </div>
  </footer>
</template>
