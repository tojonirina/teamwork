<template>
  <div class="toast fixed-bottom ml-2 mb-1" data-autohide="false" :class="'bg-' + type">
    <div class="toast-header">
      <strong :class="'mr-auto text-' + type">
        {{ title }}
      </strong>
      <small class="text-muted">Now</small>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
    </div>
    <div class="toast-body text-white">
      {{ text }}
    </div>
  </div>
</template>

<script>
export default {
    name: 'Toast',
    props: {
        title: {
            type: String,
            required: true
        },
        text: {
            type: String,
            required: true
        },
        type: {
            type: String,
            required: true
        }
    }
}
</script>