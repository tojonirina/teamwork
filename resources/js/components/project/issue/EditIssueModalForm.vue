<template>
    <div class="modal fade" :id="button">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title"><i class="ti-pencil-alt"></i> &nbsp; Edit issue</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form :action="'/accounts/' + accountId + '/projects/' + projectId + '/stages/' + stageId + '/issues/' + issueId " method="post">
                    <input type="hidden" name="_method" :value="method" />
                    <input type="hidden" name="_token" :value="token" />
                    <textarea name="issue_description" class="form-control" required>{{ issueDescription }}</textarea> <br>
                    <select class="form-control" name="owner">
                        <option :value="issueOwner">{{ issueOwner }}</option>
                        <option v-for="owner in ownerList" :value="owner">{{ owner }}</option>
                    </select> <br> <br>
                    <textarea name="notes" class="form-control" placeholder="Notes">{{ issueNote }}</textarea> <br>
                    <button type="submit" class="btn btn-success">Save</button> &nbsp; <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
        stageId: {
            type: Number,
            required: true
        },
        issueId: {
            type: Number,
            required: true
        },
        issueDescription: {
            type: String,
            required: true
        },
        issueNote: {
            type: String,
            required: true
        },
        issueOwner: {
            type: String,
            required: true
        },
        ownerList: {
            type: String,
            required: true
        },
        button: {
            type: String,
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