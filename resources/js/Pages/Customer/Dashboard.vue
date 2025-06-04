<script setup>
import { defineProps } from 'vue'
import { Line } from 'vue-chartjs'
import CustomerLayout from '@/Layouts/CustomerLayout.vue';
import { 
    Chart as ChartJS, 
    Title, 
    Tooltip, 
    Legend, 
    BarElement, 
    CategoryScale, 
    LinearScale,
    LineElement,
    PointElement,
} from 'chart.js'

ChartJS.register(
    Title, 
    Tooltip, 
    Legend, 
    LineElement,
    PointElement,
    BarElement, 
    CategoryScale, 
    LinearScale
)

const props = defineProps({
  metrics: Object,
  projectChartData: Object,
})

// const chartData = {
//   labels: Object.keys(props.projectChartData).map(m => `Month ${m}`),
//   datasets: [
//     {
//       label: 'Projects Created',
//       backgroundColor: '#4F46E5',
//       data: Object.values(props.projectChartData),
//     },
//   ],
// }
</script>

<template>
    <CustomerLayout title="Dashboard" currentPage="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Customer Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-xl sm:rounded-lg">
                    <h2>Coming Soon</h2>
                </div>
            </div>
        </div>
    </CustomerLayout>
</template>
