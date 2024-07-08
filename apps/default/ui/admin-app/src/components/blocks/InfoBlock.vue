<script setup lang="ts">
import Card from '../primitives/Card.vue'
import List from '../primitives/List.vue'
defineProps(['systemInfo'])
</script>
<template>
  <section class="bg-white py-4">
    <div class="container mx-auto flex flex-wrap pb-12 pt-4">
      <div
        v-for="(value, key) in systemInfo"
        :key="key"
        class="mb-4 flex w-full flex-shrink flex-grow flex-col px-4 md:w-1/3"
      >
        <Card :headerTitle="key" :bodyTitle="'v' + value.version">
          <template #content>
            <List :items="value.params" />
          </template>
        </Card>
      </div>
    </div>
  </section>
</template>
