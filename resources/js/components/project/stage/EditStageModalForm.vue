<template>
    <div class="modal fade" :id="button">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title"><i class="ti-pencil-alt"></i> &nbsp; Edit stage</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <div class="modal-body">
                <form :action="'/accounts/' + accountId + '/projects/' + projectId + '/stages/' + stageId" method="post">
                    <input type="hidden" name="_method" :value="method"/>
                    <input type="hidden" name="_token" :value="token" />
                    <input type="text" name="stage_title" class="form-control" :value="titleValue" required /> <br>
                    <button type="submit" class="btn btn-success">Save</button> &nbsp; <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </form>
            </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'EditStageModalForm',
        props: {
            titleValue: {
                type: String,
                required: true
            },
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