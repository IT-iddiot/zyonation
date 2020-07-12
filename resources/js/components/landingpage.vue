<template>
    <div class="homepage container m-5">
        <h1 class="m-3 text-center">{{name}}</h1>
        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-title">
                            All Page Views
                        </div>
                        <h2>{{ pageviews }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-title">
                            Unique Page Views
                        </div>
                        <h2>{{ unique_pageviews }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {

    name : "landingpage",

    props : {
        id : String,
        name : String
    },

    data() {
        return {
            pageviews : 0,
            unique_pageviews : 0,
        }
    },

    computed : {
        landing_id() {
            return parseInt(this.id);
        }
    },

    methods : {

        getAllPageViews() {
            axios
                .get('/landingpage/getPageview/' + this.landing_id)
                .then((response) => {
                    console.log()
                    this.pageviews = response.data.current_pageviews;
                    this.unique_pageviews = response.data.unique_pageviews;
                })
                .catch((error) => {
                    console.log(error);
                })
        }
        
    },

    mounted() {
        console.log("I am mounted");
        this.getAllPageViews();
    }

}
</script>

<style scoped lang='scss'>

</style>