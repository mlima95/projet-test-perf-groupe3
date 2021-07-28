import http from 'k6/http';
import { check, group, sleep, fail } from 'k6';

export let options = {
    vus: 1, // 1 user looping for 1 minute
    duration: '5m',

    thresholds: {
        http_req_duration: ['p(99)<1500'], // 99% of requests must complete below 1.5s
    },
};

const BASE_URL = 'http://localhost:8000';

export default () => {

	let callCenter = http.get(`${BASE_URL}/call/center/normal/`).json();
    check(callCenter, { 'CallCenters': (obj) => obj.length > 0 });

	let inventory = http.get(`${BASE_URL}/inventory/800000`).json();
	check(inventory, { 'Inventory': (obj) => obj.length > 0 });
    sleep(1);
};
