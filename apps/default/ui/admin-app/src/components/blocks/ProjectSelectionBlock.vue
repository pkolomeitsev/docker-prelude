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
