<template>
    <div class="container-fluid bg-primary rounded text-white bold border p-1 d-flex justify-content-between align-items-center">
        {{ stageTitle }}
        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"></button>
            <div class="dropdown-menu p-0">
                <!-- OPTIONS FORM -->
                <slot name="options"></slot>
                
                <span class="dropdown-item p-1">
                    <button class="btn btn-primary">B</button>
                    <button class="btn btn-danger">R</button>
                    <button class="btn btn-success">G</button>
                    <button class="btn btn-warning">Y</button>
                    <button class="btn btn-dark">D</button>
                </span>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'StageBlocTitle',
        props: {
            stageTitle: {
                type: String,
                required: true
            },
        }
    }
</script>