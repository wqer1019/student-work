<template>
  <div class="work_type">
      <PreseDataPanel title="任务类型设置" getUrl="work_types" url="work_type"></PreseDataPanel>
  </div>
</template>

<script>
import PreseDataPanel from '../../components/PresetDataPanel.vue'
export default {
  components: {
    PreseDataPanel
  }
}
</script>

<style lang="css">
.work_type{
}
</style>
