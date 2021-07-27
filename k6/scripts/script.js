// import http from 'k6/http';
// import { check, group, sleep, fail } from 'k6';
// export let options = {
// 	vus: 1, // 1 user looping for 1 minute
// 	duration: '1m',
// 	thresholds: {
// 		http_req_duration: ['p(99)<1500'], // 99% of requests must complete below 1.5s
// 	},
// };
// const BASE_URL = 'http://www:8741';
// export default () => {
//
// 	let myObjects = http.get(`${BASE_URL}/call/center/normal`).json();
// 	check(myObjects, { 'retrieved crocodiles': (obj) => obj.length > 0 });
// 	sleep(1);
// };

import http from 'k6/http';
import { check, group, sleep } from 'k6';

export let options = {
	stages: [
		{ duration: '5m', target: 100 }, // simulate ramp-up of traffic from 1 to 100 users over 5 minutes.
		{ duration: '10m', target: 100 }, // stay at 100 users for 10 minutes
		{ duration: '5m', target: 0 }, // ramp-down to 0 users
	],
	thresholds: {
		http_req_duration: ['p(99)<1500'], // 99% of requests must complete below 1.5s
		'logged in successfully': ['p(99)<1500'], // 99% of requests must complete below 1.5s
	},
};

const BASE_URL = 'http://www:8741';


export default () => {

	let myObjects = http.get(`${BASE_URL}/call/center/normal/`).json();
	check(myObjects, { 'retrieved crocodiles': (obj) => obj.length > 0 });
	sleep(1);
};
