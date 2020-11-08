<template>
    <div class="example">
        <div class="card">
            <div class="card-body">
                Unfulfilled
                <ul>
                    <li class="m-2" v-for="(item, index) in unfulfiiledArr" :key="index">
                        {{ item.name }} - Quantity : {{ item.quantity }} - Fulfilled Quantity : {{ item.fulfilled_quantity  }}
                    </li>
                </ul>
            </div>
        </div>

        <div class="card" v-for="(items, key, index) in newArray" :key="index">
            <div class="card-body">
                Fulfilled #{{ orderTable_number }} - F{{ key }}
                <ul>
                    <li class="m-3" v-for="(item, index) in items" :key="index">
                        {{item.order_number}} - {{ item.name }} - Quantity : {{ item.quantity }} - Fulfilled Quantity : {{ item.fulfilled_quantity  }}
                    </li>
                </ul>
            </div>
        </div>

        <div>
            <button class="btn btn-success" @click="takeSnaphot">Take snapshot</button>
        </div>

        <canvas id="canvas" width="200px" height="250px" class="mx-5 my-4 border"></canvas>

    </div>
</template>

<script>
import html2canvas from 'html2canvas';

export default {

    data() {
        return {
            exampleArr : [
                { order_number : "#1001-F10", name : "hello", payment_status : "Unpaid", fulfillment_status : "Fulfilled", quantity : 1, fulfilled_quantity : 0},
                { order_number : "#1001-F2", name : "gabriel", payment_status : "Paid", fulfillment_status : "Fulfilled", quantity : 4, fulfilled_quantity : 1},
                { order_number : "#1001-F4", name : "hfsdo", payment_status : "Unpaid", fulfillment_status : "Fulfilled", quantity : 5, fulfilled_quantity : 2},
                { order_number : "#1001-F2", name : "testing", payment_status : "Unpaid", fulfillment_status : "Fulfilled", quantity : 7, fulfilled_quantity : 0},
                { order_number : "#1001-F1", name : "ysdyasa", payment_status : "Paid", fulfillment_status : "Partially Fulfilled", quantity : 3, fulfilled_quantity : 1},
                { order_number : "#1001-F1", name : "rywerw", payment_status : "Unpaid", fulfillment_status : "Unfulfilled", quantity : 10, fulfilled_quantity : 5},
                { order_number : "#1001-F10", name : "dahbda", payment_status : "Unpaid", fulfillment_status : "Fulfilled", quantity : 13, fulfilled_quantity : 0},
                { order_number : "#1001-F2", name : "hafka", payment_status : "Paid", fulfillment_status : "Partially Fulfilled", quantity : 11, fulfilled_quantity : 11},
            ],
            orderTable_number : 1001
            
        }
    },

    computed : {

        fulfiiledArr () {
            return this.exampleArr.filter((item) => {
                return item.fulfillment_status == 'Fulfilled';
            })
        },

        unfulfiiledArr () {
            return this.exampleArr.filter((item) => {
                return item.fulfillment_status == 'Unfulfilled' || item.fulfillment_status == 'Partially Fulfilled';
            })
        },

        unfulfilledQuantity () {
            return this.unfulfiiledArr.map((item) => {
                return item.quantity;
            })
        },

        maxOrderSubNumber() {
            const allOrderNumber = this.fulfiiledArr.map((item) => {
                let order = item.order_number.split('-F');
                return parseInt(order[1]);
            })
            return Math.max(...allOrderNumber);
        },

        newArray() {
            return this.fulfiiledArr.reduce((acc, item) => {
                const order = parseInt(item.order_number.split('-F')[1]);
                // console.log(order)
                if(!acc[order]){
                    acc[order] = [];
                }
                acc[order].push(item)
                return acc;
            }, {})
        }

    },

    methods : {
        async takeSnaphot() {
            const canvas = await html2canvas(document.body, { 
                allowTaint : false,
                windowWidth : 200,
                windowHeight : 250,
                canvas : document.getElementById('canvas')
            })
            document.body.appendChild(canvas);
        }
    }

}
</script>

<style lang="scss">

.card {
    margin : 1.5rem 3rem;
    padding : 1.25rem;
}

@media screen and (max-width : 300px) {
    .card {
        margin : 10px 0;

        &-body {
            padding : 5px;
        }
    }
}

</style>