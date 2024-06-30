<script setup lang="ts">
defineProps(['tools'])
</script>
<template>
  <h1>Tools</h1>
  <a
    v-for="(value, key, index) in tools"
    :href="value"
    :key="index"
    class="btn btn-light mb-2 inline-block"
    target="_blank"
    >{{ key }}</a
  >
</template>
