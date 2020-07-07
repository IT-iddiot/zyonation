<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        Hello world
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        created() {
            document.cookie = 'name=ByeBye;expires=' + new Date(2000, 7, 8).toUTCString();
            console.log(document.cookie)
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
