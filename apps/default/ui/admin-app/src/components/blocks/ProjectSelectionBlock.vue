<script setup lang="ts">
import { ref } from 'vue'
import Multiselect from 'vue-multiselect'

const props = defineProps(['projects'])
const projectsArray = Object.keys(props.projects).map((index) => {
  return props.projects[index]
})
const projectSelected = ref('')
</script>
<template>
  <h1>Projects</h1>
  <div class="projectSelectionBlock grid w-full grid-cols-2 items-center gap-2">
    <div>
      <Multiselect
        v-model="projectSelected"
        :options="projectsArray"
        placeholder=""
        :show-labels="false"
        :options-limit="100"
      ></Multiselect>
    </div>
    <div>
      <div v-if="projectSelected">
        <a :href="'http://' + projectSelected" class="btn btn-primary" target="_blank">http://</a>
        <a :href="'https://' + projectSelected" class="btn btn-secondary" target="_blank"
          >https://</a
        >
      </div>
    </div>
  </div>
</template>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
<style lang="scss">
.projectSelectionBlock {
  .btn {
    @apply relative mr-2 rounded-lg px-5 py-2.5 text-sm font-medium text-white focus:outline-none focus:ring-4;
    &-primary {
      @apply bg-blue-700 hover:bg-blue-800 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800;
    }
    &-secondary {
      @apply bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800;
    }
  }
}
</style>
