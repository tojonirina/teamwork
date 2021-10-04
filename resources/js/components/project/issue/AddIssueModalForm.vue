<template>
    <div class="modal fade" :id="button">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title"><i class="ti-plus"></i> &nbsp; Add new issue to <strong>{{ stageTitle }}</strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form :action="'/accounts/' + accountId + '/projects/' + projectId + '/stages/' + stageId + '/issues'" method="post">
                    <input type="hidden" name="_token" :value="token" />
                    <input name="description" class="form-control" placeholder="Issues description" required /> <br>
                    <select class="form-control" name="owner">
                        <option value="">-- Select --</option>
                        <option v-for="owner in ownerList" :value="owner">{{ owner }}</option>
                    </select> <br> <br>
                    <textarea name="notes" class="form-control" placeholder="Notes"></textarea> <br>
                    <button type="submit" class="btn btn-success">Add</button> &nbsp; <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </form>
            </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'AddIssueModalForm',
    props: {
        accountId: {
            type: String,
            required: true
        },
        projectId: {
            type: Number,
            required: true
        },
        stageTitle: {
            type: String,
            required: true
        },
        stageId: {
            type: Number,
            required: true
        },
        button: {
            type: String,
            required: true
        },
        token: {
            type: String,
            required: true
        },
        ownerList: {
            type: Array,
            required: true
        }
    }
}
</script>