<template>
    <div class="container my-5">
        <h2 class="text-center">
            All Page Views
        </h2>
        <div class="row my-5 mx-2 justify-content-between mx-auto">
            <div class="card text-center col-md-3 p-0" v-for="(item,index) in allPageViews" :key="index">
                <div @click="toPage(item.path)" class="card-header">
                    <strong class="btn btn-link">{{ item.name }}</strong> 
                </div>
                <div class="card-body">
                    <h6 class="mb-3">
                        Page Views 
                    </h6>
                    <h4 class="mt-1 mb-2">
                        {{ item.pageviews }}
                    </h4>

                    <h6 class="mt-4 mb-3">
                        Unique Page Views 
                    </h6>
                    <h4 class="mt-1 mb-2">
                        {{ item.unique_pageviews }}
                    </h4>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {

    name : "page",

    props: ['pageviews'],

    data() {
        return {
            allPageViews : null,
            page_views : null,
            unique_page_views : null
        }
    },

    computed : {

    },

    methods : {
        toPage(path) {
            window.location.href = '/landingpage/' + path;
        }
    },

    mounted() {
        this.allPageViews = JSON.parse(this.pageviews);
    }

}
</script>

<style scoped lang="scss">

    h6 {
        font-size : 1rem;
    }

    .card-header {
        cursor : pointer;
        padding : 8px;
        font-family: 'Roboto', sans-serif;
    }

    .pathLink {
        color : royalblue;
        text-decoration: underline;
    }

    .card-body {
        font-family: 'Roboto', sans-serif;
        font-weight: 400;
    }

    @media (min-width: 768px) {
        .col-md-3 {
            flex: 0 0 24%;
            max-width: 25%;
        }
    }

</style>