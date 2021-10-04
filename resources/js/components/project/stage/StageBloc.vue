<template>
    <div class="p-1 stage-bloc">
        <slot name="edit-stage-modal"></slot>
        <slot name="add-issue-modal"></slot>
        <slot name="stage-unity"></slot>
    </div>
</template>

<script>
    export default {
        name: 'StageBloc',
    }
</script>