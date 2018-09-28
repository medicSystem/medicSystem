<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('news')->insert([
            [
                'photo' => 'man-and-woman-exercising.jpg',
                'news_name' => 'How body fat affects men\'s and women\'s health differently',
                'content' => 'More and more adults in the Western world are obese, and the Western high-fat diet might be to blame.

However, men and women react differently to a high-fat diet.

These differences were the focus of scientists at the University of California, Riverside (UCR), who set out to examine the health consequences of obesity in male and female rodents.

Djurdjica Coss, an associate professor of biomedical sciences in the UCR School of Medicine, led the study, which is now published in the journal Frontiers in Immunology.

Coss and colleagues examined the role of the female hormone estrogen in accumulating fat, as well as the health consequences of being overweight in male versus female rodents.',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],

            [
                'photo' => 'tired-looking-man-at-work.jpg',
                'news_name' => 'Urologic conditions lead to depression, sleep issues in men',
                'content' => 'This was the main conclusion that investigators at the University of California, Irvine (UCI) came to after studying 124 men aged 54, on average, who were attending a clinic specializing in men\'s health.

The men completed detailed questionnaires about mental and general health, sleep, and urologic conditions, such as erectile function and ease or difficulty in passing urine, which could indicate prostate problems.

They had also filled in a questionnaire that is used to screen men at risk of low male sex hormones. The researchers then analyzed the men\'s responses against information held in their health records, which included results of laboratory tests and medical histories.',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],

            [
                'photo' => 'man-reading-letter-and-worrying-about-signs-of-lung-cancer-in-men.jpg',
                'news_name' => 'What are the early signs of lung cancer in men?',
                'content' => 'According to the American Cancer Society, lung cancer is the second most common cancer and the leading cause of cancer deaths among both males and females in the country. The organization also estimates that in 2018 in the United States there will be:

234,030 new cases of lung cancer, including 121,680 in men and 112,350 in women
154,050 deaths from lung cancer, including 83,550 men and 70,500 women
People who smoke have a much higher risk of developing lung cancer than nonsmokers. In the U.S., cigarette smoking is more common in men than in women.

In this article, we look at the early signs and symptoms of lung cancer in males. We also describe when to see a doctor, how the doctor makes a diagnosis, and tips for coping with symptoms.',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],

            [
                'photo' => 'bicycle.jpg',
                'news_name' => 'Short high-intensity exercise ',
                'content' => 'A new study has shown that performing high-intensity interval or sprinting exercise for a few minutes may be equally as beneficial as exercising at a moderate-intensity level for longer periods.

The study, which has recently been published in the American Journal of Physiology-Regulatory, Integrative and Comparative Physiology, showed that short bursts of higher intensity exercise were just as effective at improving mitochondrial function as moderate-intensity exercise carried out for longer periods.

Previously, studies have shown that exercise generates more of the energy-producing mitochondria in our cells, as well as improving the function of mitochondria that are already present. This improved function can be beneficial to cells and decrease the risk of chronic disease, but whether or not the intensity of exercise affects this mitochondrial response has been unclear.

To investigate, the authors of the current study studied eight young adults who performed cycling workouts at different levels of intensity.

Moderate intensity was defined as 30 minutes of ongoing exercise at 50% peak effort; high-intensity as five four-minute sessions at 75% peak effort, with a one-minute rest period in-between each session and sprint cycling as four 30-second sessions at maximum effort with 4.5 minutes rest in-between.',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],

            [
                'photo' => 'physiotherapy.jpg',
                'news_name' => 'What are the challenges physiotherapy?',
                'content' => 'One of the biggest challenges is access to physiotherapy. It takes months to get an appointment with a physiotherapist through the NHS as there is only one physiotherapist per 2000 inhabitants.
                
                here is also the problem of the UK population getting older, meaning more and more people are in need of physiotherapy.

This low number of physiotherapists, combined with a high demand for services, means that patients are not receiving the gold standard of care when it comes to rehabilitation. This reduces the number of patients that make a full recovery and increases the length of time spent in the health care system.',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],

            [
                'photo' => 'EGID.jpg',
                'news_name' => 'Eosinophilic Gastrointestinal Disorders: Diagnosis',
                'content' => 'Eosinophilic gastrointestinal disorders (EGID) are disorders of the gut in which excessive numbers of eosinophils are seen in the gut mucosa on biopsies taken from one or more sites.

The condition embraces several variants such as eosinophilic esophagitis, eosinophilic enteritis, and eosinophilic gastritis. In most cases, the eosinophilia is one manifestation of a hypersensitivity reaction to antigens in some foods.',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],

            [
                'photo' => 'glasses.jpg',
                'news_name' => 'Importance of Regular Eye Checks',
                'content' => 'A general layman perception about eye testing is that it is only for checking the power of the glasses we need. However, there is much more to a full eye examination than visual acuity tests.

Visual acuity tests involve the assessment of reading capacity of eyes from a given distance. The patient is asked to read out the fonts of different sizes, while covering one eye at a time, and with both eyes open.

Based on how conveniently one can read the alphabets and characters, the optometrist keeps changing the lens combinations until appropriate power is identified.

This is the most basic and manual method of evaluating visual acuity, which is also often practiced by non-specialists and opticians locally. Ophthalmologists also supplement it with a machine test for approximation of eye power.',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
        ]);


    }
}
