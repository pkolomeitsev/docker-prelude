<script setup lang="ts">
defineProps<{ items: Object }>()
// console.log(items)
</script>

<template>
  <ul>
    <li v-for="(value, key) in items" :key="key">
      {{
        key.charAt(0).toUpperCase() +
        key
          .split(/\.?(?=[A-Z])/)
          .join(' ')
          .slice(1)
      }}: {{ value }}
    </li>
  </ul>
</template>
