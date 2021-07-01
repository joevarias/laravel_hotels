<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HotelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotels')->insert([

        // City Garden Hotel

        	['city_id'=>'1', 'hotel_name' => 'City Garden Hotel', 'hotel_address' => '7870 Makati Ave Corner Durban Street, Poblacion, Makati, 1210 Manila, Philippines', 'hotel_intro' => 'Get the celebrity treatment with world-class service at City Garden Hotel', 'image_path' => 'images/hotels/City_Garden_Hotel/City_Garden_Hotel1623679094.jpg', 'hotel_description' => "Enjoy leisurely stays at City Garden Makati with spacious rooms and free access to first-rate facilities, including an outdoor pool fitness center and WiFi.

Featuring city views from oversize windows, air-conditioned rooms are decorated in pleasant shades of beige and pale golds. They have cable TV and a kitchenette with free tea/coffee making amenities and a fridge. Local calls can be made for free.

Relaxing spa treatments and sauna facilities await after a day’s of activity. Alternatively, take a dip in the outdoor pool located on the roofdeck. A business center and 24-hour reception are available for guests’ convenience.

A variety of Asian and international dishes can be sampled at City Garden's Encima and Bistro.

Located just steps away from shopping, dining and nightlife options, City Garden Hotel Makati is a 5-minute drive from major shopping malls like Glorietta and Landmark in Makati's business district. It is a 30-minute drive from Ninoy Aquino International Airport.

This is our guests' favorite part of Manila, according to independent reviews.

Couples in particular like the location – they rated it 8.5 for a two-person trip.

We speak your language!", 'phone_number' => '1111111111', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


	//The Peninsula

        	['city_id'=>'1', 'hotel_name' => 'The Peninsula', 'hotel_address' => 'Corner of Ayala and Makati Avenues, 1226 , Makati, 1226 Manila, Philippines', 'hotel_intro' => 'Get the celebrity treatment with world-class service at The Peninsula Manila', 'image_path' => 'images/hotels/The_Peninsula/The_Peninsula1623679094.jpg', 'hotel_description' => "Set in Manila within the central business district of Makati, 0.6 mi from Glorietta and 0.8 mi from Greenbelt Mall, The Peninsula Manila features of an outdoor swimming pool, 8 dining options, and a spa at the property. Free WiFi is also available throughout the hotel.

Featuring views of the city, the rooms come with air conditioning, a flat-screen cable TV, and a safety deposit box. Other in-room amenities include a tea/coffee maker, a mini-bar, and an electric kettle. The private bathrooms include a hairdryer, a bath or a shower, and free toiletries while some rooms are fitted with a living and dining area.

Escolta serves an international buffet, while Spices offers Asian cuisine with garden views. For afternoon tea and pastries, The Lobby is available. Enjoy fine dining at Old Manila, the hotel's signature restaurant wile elegant cocktails are served at Salon de Ning or The Bar. Deli sandwiches and chocolates are available at The Peninsula Boutique. The Pool Bar offers a refreshing outdoor dining experience while room service is also available.

Guests can exercise in the gym, relax in the sauna, or make an appointment at the hair salon. Inspired by Oriental, Ayurvedic, and European practices, The Peninsula Spa features a serene setting for a much deserved urban relaxation.

The hotel offers other facilities such as a gift shop and a kid's club. Airport shuttle services may be arranged for guests at an additional cost while the staff at the 24-hour front desk and concierge is willing to assist guests with any queries at any time of the day. There is an ATM and currency exchange at the property, as well as free parking.

The Peninsula Manila is within 10-minute drive from Century City Mall while Power Plant Mall is 15-minute drive from the hotel. The nearest airport is Manila International Airport, 30-minute drive away from the hotel.

This is our guests' favorite part of Manila, according to independent reviews.

Couples in particular like the location – they rated it 9.3 for a two-person trip.

We speak your language!", 'phone_number' => '1111111111', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


		//The Manila Hotel

        	['city_id'=>'2', 'hotel_name' => 'The Manila Hotel', 'hotel_address' => 'One Rizal Park, 0913 Manila, Philippines', 'hotel_intro' => 'Stay in the heart of Manila', 'image_path' => 'images/hotels/The_Manila_Hotel/The_Manila_Hotel1623679094.jpg', 'hotel_description' => "Manila Hotel is a beautiful 5-star hotel located in Manila just 701 m from iconic Intramuros and 901 m from Manila Cathedral. The hotel provides free Wi-Fi access and facilities like in-house dining options, a business center and an outdoor swimming pool.

Rooms are elegantly decorated and provide guests with a flat-screen TV, air conditioning and a seating area. Featuring a shower, the private bathrooms also come with a bath and a hairdryer. The suites have an ipod docking station, bathrooms fitted with Italian marble and a senso memory foam mattress. Some rooms offer views of Manila Bay, while other offer views of the city.

The Red Jade Restaurant serves authentic Cantonese dishes, while The Champagne Room provides French delicacies. There is also Cafe Ilang-Ilang which serves Halal and international cuisines. Guests can also relax in The Tap Room Bar or in the lobby lounge. Alternatively, enjoy a refreshing drink by the Pool Bar. The hotel's deli services desserts and drinks throughout the day.

Other facilities at the hotel include a fitness center and a spa. The spa offers a variety of massages.

The hotel is located 901 m from Palacio del Gobernador, while Ninoy Aquino Airport is 6.5 mi away. The property offers free parking for guests' convenience.

Couples in particular like the location – they rated it 8.5 for a two-person trip.

We speak your language!", 'phone_number' => '1111111111', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


		// Manila Lotus Hotel

        	['city_id'=>'2', 'hotel_name' => 'Manila Lotus Hotel', 'hotel_address' => '1227 A. Mabini St. cor. P. Faura St. Ermita, 1000 Manila, Philippines', 'hotel_intro' => 'Stay in the heart of Manila', 'image_path' => 'images/hotels/Manila_Lotus_Hotel/Manila_Lotus_Hotel1623679094.jpg', 'hotel_description' => "Featuring a fitness room, Manila Lotus Hotel offers hot tub facilities and massage services. It has 2 restaurants and a sports bar. Rooms have cable TVs and tea/coffee makers.

Manila Lotus Hotel is within a 10-minute walk from United Nations and Padre Faura LRT Station. Roxas Boulevard and Manila Bay are also approximately a 10-minute stroll away.

Rooms at the Manila Lotus Hotel feature classic wood furnishings and offer mini-bars. Hairdryers are provided in its private bathrooms.

Manila Lotus Hotel has a tour and travel center that assists with guests’ sightseeing arrangements. Currency exchange and car rental services are also available in the hotel.

Filipino dishes are served at the Cilantro Restaurant while Cellar Bar and Grill features both local and European cuisine. Wines, cocktails and billiard tables are available at the Wings Over Manila Sports Bar. Room service options are available until 00:00 daily.

Couples in particular like the location – they rated it 8.2 for a two-person trip.

We speak your language!", 'phone_number' => '1111111111', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


		// Seda Vertis North
        	['city_id'=>'3', 'hotel_name' => 'Seda Vertis North', 'hotel_address' => 'Astra corner Lux Drives Vertis North, Diliman, Quezon City, 1101 Manila, Philippines', 'hotel_intro' => 'Get the celebrity treatment with world-class service at Seda Vertis North' , 'image_path' => 'images/hotels/Seda_Vertis_North/Seda_Vertis_North1623679094.jpg', 'hotel_description' => "Offering an outdoor pool and views of the city, Seda Vertis North is located beside Ayala Malls Vertis North in Quezon City. The hotel has an outdoor pool and a ballroom, and guests can enjoy a meal at the restaurant or a drink at the bar. Free WiFi is provided throughout the property.

The air-conditioned rooms are fitted with an LED HDTV with cable channels, mini-bar and safety deposit box. The private bathroom is equipped with a shower and hairdryer. For your comfort, you will find bathrobes, slippers and free toiletries. Towels and linen are also provided.

You will find a 24-hour front desk at the property where staff can assist guests with luggage storage and valet parking. Car hire and airport transfer can be arranged at a fee.

Misto Restaurant features all-day international dining with a show kitchen and 7 interactive cooking stations.

TriNoma Mall is 701 m from Seda Vertis North. The nearest airport is Manila International Airport, 11 mi away.

Couples in particular like the location – they rated it 8.9 for a two-person trip.

We speak your language!", 'phone_number' => '1111111111', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


		// Novotel Manila
        	['city_id'=>'3', 'hotel_name' => 'Novotel Manila', 'hotel_address' => 'General Aguinaldo Avenue, Araneta City, Cubao, Quezon City, 0810 Manila, Philippines', 'hotel_intro' => 'Stay in an excellent location within Quezon City', 'image_path' => 'images/hotels/Novotel_Manila/Novotel_Manila1623679094.jpg', 'hotel_description' => "Located within the business district of Quezon City, Novotel Manila Araneta City offers contemporary accommodations with easy access to LRT/MRT Stations, Gateway Mall and Smart Araneta Center. It features an outdoor pool, all-day dining restaurant, a grand ballroom and 7 meeting rooms.

You will find a 24-hour front desk at the property. A lounge and on-site bar is also available.

Smart Araneta Coliseum is a few steps from Novotel Manila Araneta City, while Bonifacio High Street is 5 mi from the property. The nearest airport is Ninoy Aquino Airport, 8.7 mi from the property.

Couples in particular like the location – they rated it 9.2 for a two-person trip.

We speak your language!", 'phone_number' => '1111111111', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


		// Sofitel Manila
        	['city_id'=>'4', 'hotel_name' => 'Sofitel Manila', 'hotel_address' => 'CCP Complex, Roxas Boulevard, Pasay, 1300 Manila, Philippines', 'hotel_intro' => 'Get the celebrity treatment with world-class service at Sofitel Philippine Plaza Manila',  'image_path' => 'images/hotels/Sofitel_Manila/Sofitel_Manila1623679094.jpg', 'hotel_description' => "Located in Pasay City, Sofitel Philippine Plaza Manila offers rooms with private balconies and views of Manila Bay. It features an outdoor pool, a spa, various restaurants and bars.

Air-conditioned rooms are equipped with a cable TV, a personal safe and ironing facilities. Private bathrooms come with a hairdryer, bathtub and free toiletries.

Exercise options include a jogging trail, tennis courts and a fitness center. Guests can enjoy a pampering massage at Le SPA or relax at the spa pool and sauna. Other facilities include a grand ballroom and 14 meeting rooms.

The hotel’s flagship restaurant, Spiral, features 21 dining ateliers that serve exquisite dishes prepared masterfully in the presence of guests. Drinks can be enjoyed at Le Veranda and Sunset Bar. Sports fan can catch up on the latest matches at Snaps Sports Bar.

Sofitel Philippine Plaza Manila is located beside the Cultural Center of the Philippines Complex. It is less than 1.2 mi away from the Mall of Asia. It is located about 4.3 mi away from Manila International Airport and a 30-minute drive from Makati City.

Couples in particular like the location – they rated it 8.6 for a two-person trip.

We speak your language!", 'phone_number' => '1111111111', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


		// Conrad Manila
        	['city_id'=>'4', 'hotel_name' => 'Conrad Manila', 'hotel_address' => 'Seaside Boulevard corner Coral Way, Mall of Asia Complex, , Pasay, 1300 Manila, Philippines', 'hotel_intro' => 'Get the celebrity treatment with world-class service at Conrad Manila', 'image_path' => 'images/hotels/Conrad_Manila/Conrad_Manila1623679094.jpg', 'hotel_description' => "Featuring free WiFi in public areas, Conrad Manila is located in Manila, 100 m from SMX Convention Center. Guests can enjoy the on-site bar. Free private parking is available on site.

Each room at this hotel is air conditioned and comes with a flat-screen TV with cable channels. Certain rooms have a seating area for your convenience. For your comfort, you will find bath robes, slippers and free toiletries.

You will find a gift shop at the property.

The hotel also offers car hire. SM Mall of Asia is 300 m from Conrad Manila, while SM Mall of Asia Arena is 300 m away. The nearest airport is Manila International Airport, 2.5 mi from Conrad Manila.

Couples in particular like the location – they rated it 9.3 for a two-person trip.

We speak your language!", 'phone_number' => '1111111111', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


	// Shangri-La Manila
        	['city_id'=>'5', 'hotel_name' => 'Shangri-La Manila', 'hotel_address' => '30th Street corner 5th Avenue, Bonifacio Global City, Taguig, 1634 Manila, Philippines', 'hotel_intro' => 'Get the celebrity treatment with world-class service at Shangri-La The Fort, Manila', 'image_path' => 'images/hotels/Shangri-La_Manila/Shangri-La_Manila1623679094.jpg', 'hotel_description' => "Right at the heart of Manila's lifestyle city in Taguig, Shangri-La The Fort, Manila -- Staycation Approved towers over Bonifacio Global City boasting of two outdoor swimming pool, several dining options, and free WiFi throughout the property. This 5-star hotel is within 260 m from the Mind Museum and 851 m from Bonifacio High Street.

Features with luxuriously furnishing, all rooms at the hotel offer views of the city and are fitted with a flat-screen TV with cable channels, air conditioning, and a safety deposit box. Every room is equipped with a private bathroom with shower or bath facilities, slippers and free toiletries.

At the hotel, guests can indulge on the daily buffet breakfast and different culinary experiences. The High Street Cafe and High Street Lounge features international selection and freshly baked pastries. The Canton Road serves authentic Chinese Cuisine and the Raging Bull Chophouse & Bar is a steakhouse that serves a la carte options while the Raging Bull Burgers offers American specialties. Samba delights guests with Peruvian cuisine. In-room dining may be arranged for guests.

The outdoor swimming pool provides a relaxing urban setting for guests who simply wish to lounge and marvel on city views. The pool bar is open to serve drinks. Guests can workout at the on-site fitness center or make use of the sauna. Spa at Kerry Sports Manila can help guests relax and melt their stress away with Spa at Kerry Sports' signature massage. The Kid's Club is also available with extra cost.

The 24-hour front desk can assist guests with services such as laundry, dry cleaning and luggage storage. Airport shuttle and car rental may be arranged for guests at an additional cost. The hotel's meeting/banquet facility may also be used at an extra charge.

Glorietta Mall is 2.5 mi away while Greenbelt Mall is 2.5 mi from the hotel. The nearest airport is Manila International Airport, 4.5 mi from Shangri-La The Fort, Manila -- Staycation Approved.

Couples in particular like the location – they rated it 9.6 for a two-person trip.

We speak your language!", 'phone_number' => '1111111111', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],


		// Ascott Bonifacio Global City
        	['city_id'=>'5', 'hotel_name' => 'Ascott Bonifacio Global City', 'hotel_address' => 'Fifth Avenue corner 28th Street, Bonifacio Global City, Taguig, 1634 Manila', 'hotel_intro' => 'Experience World-class Service at Ascott Bonifacio Global City Manila', 'image_path' => 'images/hotels/Ascott_Bonifacio_Global_City/Ascott_Bonifacio_Global_City1623679094.jpg', 'hotel_description' => "Conveniently located in Taguig City, Ascott Bonifacio Global City Manila offers modern and luxurious accommodations with free WiFi access in the entire property. Operating a 24-hour front desk, it features an outdoor pool, business center and sauna facility.

The property is just 131 m from The Mind Museum, while St. Lukes Medical Center and S&R Membership Shopping are within 221 m away. Makati Central Business District is accessible with a 2.2 mi drive, and Ninoy Aquino International is 4.6 mi away.

Offering city views, air-conditioned guestrooms come with ironing facilities, in-room safe, a flat-screen cable TV and seating area. A dining table, microwave and coffee machine are also included. Private bathroom has shower facility, hairdryer, slippers and free toiletries.

Friendly staff at Ascott Bonifacio Global City Manila is fluently-conversed in Filipino and English. Concierge services, airport shuttles and meeting/banquet facilities are available for guests’ convenience.

The in-house restaurant serves a delectable selection of international cuisines.

Couples in particular like the location – they rated it 9.8 for a two-person trip.

We speak your language!", 'phone_number' => '1111111111', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],

        ]);
    }
}
