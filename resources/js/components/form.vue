<template>
    <div class="example">
        <div class="card">
            <div class="card-body">

                <!-- <ul>
                    <li v-for="(item, index) in exampleArr" :key="index">
                        <template>

                        </template>
                    </li>
                </ul>

                <ul>
                    <li v-for="(item, index) in exampleArr" :key="index">
                        <template>

                        </template>
                    </li>
                </ul> -->
            </div>
        </div>
    </div>
</template>

<script>
export default {

    data() {
        return {
            exampleArr : [
                {name : "hello", payment_status : "Unpaid", fulfillment_status : "Unfulfilled", quantity : 1, fulfilled_quantity : 0},
                {name : "gabriel", payment_status : "Paid", fulfillment_status : "Fulfilled", quantity : 4, fulfilled_quantity : 1},
                {name : "hfsdo", payment_status : "Unpaid", fulfillment_status : "Fulfilled", quantity : 5, fulfilled_quantity : 2},
                {name : "testing", payment_status : "Unpaid", fulfillment_status : "Unfulfilled", quantity : 7, fulfilled_quantity : 0},
                {name : "ysdyasa", payment_status : "Paid", fulfillment_status : "Partially Fulfilled", quantity : 3, fulfilled_quantity : 1},
                {name : "rywerw", payment_status : "Unpaid", fulfillment_status : "Unfulfilled", quantity : 10, fulfilled_quantity : 5},
                {name : "dahbda", payment_status : "Unpaid", fulfillment_status : "Fulfilled", quantity : 13, fulfilled_quantity : 0},
                {name : "hafka", payment_status : "Paid", fulfillment_status : "Partially Fulfilled", quantity : 11, fulfilled_quantity : 11},
            ],
            fulfilled_array : null,
            unfulfilled_array : null
        }
    },

    methods : {
        assginFulfiiledArr () {
            this.fulfilled_array = this.exampleArr.find((item) => {
                console.log(item)
                return item.fulfillment_status == 'Fulfilled';
            })
        },

        assginUnfulfiiledArr () {
            this.unfulfilled_array = this.exampleArr.find((item) => {
                console.log(item)
                return item.fulfillment_status == 'Unfulfilled' || item.fulfillment_status == 'Partially Fulfilled';
            })
        },
    }

}
</script>

<style>

</style>