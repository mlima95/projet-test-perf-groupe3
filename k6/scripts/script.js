
import http from 'k6/http';
import { check, sleep } from 'k6';

export let options = {
	stages: [
		{ duration: '2m', target: 100 }, // simulate ramp-up of traffic from 1 to 100 users over 5 minutes.
		{ duration: '5m', target: 100 }, // stay at 100 users for 10 minutes
		{ duration: '3m', target: 0 }, // ramp-down to 0 users
	],
	thresholds: {
		http_req_duration: ['p(99)<1500'], // 99% of requests must complete below 1.5s
		'logged in successfully': ['p(99)<1500'], // 99% of requests must complete below 1.5s
	},
};

const BASE_URL = 'http://localhost:8000';


export default () => {
	let myObjects = http.get(`${BASE_URL}/call/center/normal/`).json();
	check(myObjects, { 'retrieved crocodiles': (obj) => obj.length > 0 });
	sleep(1);
};
