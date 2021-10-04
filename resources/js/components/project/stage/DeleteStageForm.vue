<template>
    <form :action="'/accounts/' + accountId + '/projects/' + projectId + '/stages/' + stageId" method="POST">
        <input type="hidden" name="_method" :value="method"/>
        <input type="hidden" name="_token" :value="token" />
        <button class="dropdown-item text-danger"><i class="ti-trash"></i> &nbsp; Delete</button>
    </form>
</template>

<script>
export default {
    name: 'DeleteStageForm',
    props: {
        accountId: {
            type: String,
            required: true
        },
        projectId: {
            type: Number,
            required: true
        },
        stageId: {
            type: Number,
            required: true
        },
        method: {
            type: String,
            required: true
        },
        token: {
            type: String,
            required: true
        }
    }
}
</script>