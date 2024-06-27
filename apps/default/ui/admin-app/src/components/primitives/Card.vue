<script setup lang="ts">
defineProps(['headerTitle', 'bodyTitle', 'content'])
</script>
<template>
  <div class="border shadow">
    <div class="card-header border-b bg-gray-100 p-3 text-center">
      <h4 class="my-0 text-2xl uppercase">{{ headerTitle }}</h4>
    </div>
    <div class="card-body p-4">
      <h1 class="card-title pb-4 text-center text-4xl">{{ bodyTitle }}</h1>
      {{ content }}
      <slot name="content"></slot>
    </div>
  </div>
</template>
