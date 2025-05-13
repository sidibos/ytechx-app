<script setup>
import { defineProps } from 'vue'
import { Line } from 'vue-chartjs'
import AppLayout from '@/Layouts/AppLayout.vue';
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

const chartData = {
  labels: Object.keys(props.projectChartData).map(m => `Month ${m}`),
  datasets: [
    {
      label: 'Projects Created',
      backgroundColor: '#4F46E5',
      data: Object.values(props.projectChartData),
    },
  ],
}
</script>

<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                        <div class="bg-white p-4 shadow rounded">
                            <h3 class="font-semibold text-gray-600">Quotes</h3>
                            <p>Total: {{ metrics.quotes.total }}</p>
                            <p>Approved: {{ metrics.quotes.approved }}</p>
                            <p>Pending: {{ metrics.quotes.pending }}</p>
                            <p>Rejected: {{ metrics.quotes.rejected }}</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded">
                            <h3 class="font-semibold text-gray-600">Projects</h3>
                            <p>Total: {{ metrics.projects.total }}</p>
                            <p>In Progress: {{ metrics.projects.in_progress }}</p>
                            <p>Completed: {{ metrics.projects.completed }}</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded">
                            <h3 class="font-semibold text-gray-600">Contracts</h3>
                            <p>Signed: {{ metrics.contracts.signed }}</p>
                        </div>
                        <div class="bg-white p-4 shadow rounded">
                            <h3 class="font-semibold text-gray-600">Tasks</h3>
                            <p>Total: {{ metrics.tasks.total }}</p>
                            <p>Done: {{ metrics.tasks.done }}</p>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded shadow">
                        <h2 class="text-xl font-semibold mb-4">Projects per Month</h2>
                        <Line :data="chartData" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
