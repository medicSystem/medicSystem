<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DirectoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('directories')->insert([
            [
                'disease_name' => 'Cholera',
                'category' => 'Infections',
                'treatment' => 'Continued eating speeds the recovery of normal intestinal function. The World Health Organization recommends this generally for cases of diarrhea no matter what the underlying cause. A CDC training manual specifically for cholera states: "Continue to breastfeed your baby if the baby has watery diarrhea, even when traveling to get treatment. Adults and older children should continue to eat frequently."',
                'symptoms' => 'The primary symptoms of cholera are profuse diarrhea and vomiting of clear fluid.[13] These symptoms usually start suddenly, half a day to five days after ingestion of the bacteria.[14] The diarrhea is frequently described as "rice water" in nature and may have a fishy odor.[13] An untreated person with cholera may produce 10 to 20 litres (3 to 5 US gal) of diarrhea a day.[13] Severe cholera, without treatment, kills about half of affected individuals.[13] If the severe diarrhea is not treated, it can result in life-threatening dehydration and electrolyte imbalances.[13] Estimates of the ratio of asymptomatic to symptomatic infections have ranged from 3 to 100.[15] Cholera has been nicknamed the "blue death"[16] because a person\'s skin may turn bluish-gray from extreme loss of fluids.[17]',
                'picture' => 'Cholera.jpg',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'disease_name' => 'Plague',
                'category' => 'Infections',
                'treatment' => 'If diagnosed in time, the various forms of plague are usually highly responsive to antibiotic therapy. The antibiotics often used are streptomycin, chloramphenicol and tetracycline. Amongst the newer generation of antibiotics, gentamicin and doxycycline have proven effective in monotherapeutic treatment of plague.[20]

The plague bacterium could develop drug-resistance and again become a major health threat. One case of a drug-resistant form of the bacterium was found in Madagascar in 1995.[21] Further outbreaks in Madagascar were reported in November 2014[22] and October 2017[23].',
                'symptoms' => 'The pneumonic form of plague arises from infection of the lungs. It causes coughing and sneezing and thereby produces airborne droplets that contain bacterial cells and are likely to infect anyone inhaling them. The incubation period for pneumonic plague is short, usually two to four days, but sometimes just a few hours. The initial signs are indistinguishable from several other respiratory illnesses; they include headache, weakness and spitting or vomiting of blood. The course of the disease is rapid; unless diagnosed and treated soon enough, typically within a few hours, death may follow in one to six days; in untreated cases mortality is nearly 100%.',
                'picture' => 'plague.jpg',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'disease_name' => 'Pneumonia',
                'category' => 'Infections',
                'treatment' => 'The World Health Organization has defined pneumonia in children clinically based on either a cough or difficulty breathing and a rapid respiratory rate, chest indrawing, or a decreased level of consciousness.[51] A rapid respiratory rate is defined as greater than 60 breaths per minute in children under 2 months old, greater than 50 breaths per minute in children 2 months to 1 year old, or greater than 40 breaths per minute in children 1 to 5 years old.[51] In children, low oxygen levels and lower chest indrawing are more sensitive than hearing chest crackles with a stethoscope or increased respiratory rate.[52] Grunting and nasal flaring may be other useful signs in children less than five years old.[53] Lack of wheezing is an indicator of Mycoplasma pneumoniae in children with pneumonia, but as an indicator it is not accurate enough to decide whether or not macrolide treatment should be used.[54] The presence of chest pain in children with pneumonia doubles the probability of Mycoplasma pneumoniae.[54]',
                'symptoms' => 'People with infectious pneumonia often have a productive cough, fever accompanied by shaking chills, shortness of breath, sharp or stabbing chest pain during deep breaths, and an increased rate of breathing.[8] In elderly people, confusion may be the most prominent sign.[8]

The typical signs and symptoms in children under five are fever, cough, and fast or difficult breathing.[20] Fever is not very specific, as it occurs in many other common illnesses and may be absent in those with severe disease, malnutrition or in the elderly. In addition, a cough is frequently absent in children less than 2 months old.[20] More severe signs and symptoms in children may include blue-tinged skin, unwillingness to drink, convulsions, ongoing vomiting, extremes of temperature, or a decreased level of consciousness.',
                'picture' => 'pneumonia.jpg',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'disease_name' => 'Syphilis',
                'category' => 'Infections',
                'treatment' => 'The first-line treatment for uncomplicated syphilis remains a single dose of intramuscular benzathine benzylpenicillin.[42] Doxycycline and tetracycline are alternative choices for those allergic to penicillin; due to the risk of birth defects, these are not recommended for pregnant women.[42] Resistance to macrolides, rifampicin, and clindamycin is often present.[15] Ceftriaxone, a third-generation cephalosporin antibiotic, may be as effective as penicillin-based treatment.[2] It is recommended that a treated person avoid sex until the sores are healed.[23]',
                'symptoms' => 'Primary syphilis is typically acquired by direct sexual contact with the infectious lesions of another person.[17] Approximately 3 to 90 days after the initial exposure (average 21 days) a skin lesion, called a chancre, appears at the point of contact. This is classically (40% of the time) a single, firm, painless, non-itchy skin ulceration with a clean base and sharp borders approximately 0.3–3.0 cm in size.[2] The lesion may take on almost any form. In the classic form, it evolves from a macule to a papule and finally to an erosion or ulcer.[18] Occasionally, multiple lesions may be present (~40%),[2] with multiple lesions being more common when coinfected with HIV. Lesions may be painful or tender (30%), and they may occur in places other than the genitals (2–7%). The most common location in women is the cervix (44%), the penis in heterosexual men (99%), and anally and rectally in men who have sex with men (34%).[18] Lymph node enlargement frequently (80%) occurs around the area of infection,[2] occurring seven to 10 days after chancre formation.[18] The lesion may persist for three to six weeks if left untreated.[2]',
                'picture' => 'syphilis.jpg',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'disease_name' => 'Trachoma',
                'category' => 'Infections',
                'treatment' => 'Antibiotic therapy: WHO Guidelines recommend that a region should receive community-based, mass antibiotic treatment when the prevalence of active trachoma among one- to nine-year-old children is greater than 10 percent.[14] Subsequent annual treatment should be administered for three years, at which time the prevalence should be reassessed. Annual treatment should continue until the prevalence drops below five percent. At lower prevalences, antibiotic treatment should be family-based.',
                'symptoms' => 'The bacterium has an incubation period of 5 to 12 days, after which the affected individual experiences symptoms of conjunctivitis, or irritation similar to "pink eye". Blinding endemic trachoma results from multiple episodes of reinfection that maintains the intense inflammation in the conjunctiva. Without reinfection, the inflammation will gradually subside.[7]

The conjunctival inflammation is called "active trachoma" and usually is seen in children, especially pre-school children. It is characterized by white lumps in the undersurface of the upper eyelid (conjunctival follicles or lymphoid germinal centres) and by non-specific inflammation and thickening often associated with papillae. Follicles may also appear at the junction of the cornea and the sclera (limbal follicles). Active trachoma will often be irritating and have a watery discharge. Bacterial secondary infection may occur and cause a purulent discharge.',
                'picture' => 'trachoma.jpg',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'disease_name' => 'Lyme disease',
                'category' => 'Infections',
                'treatment' => 'Antibiotics are the primary treatment.[2][137] The specific approach to their use is dependent on the individual affected and the stage of the disease.[137] For most people with early localized infection, oral administration of doxycycline is widely recommended as the first choice, as it is effective against not only Borrelia bacteria but also a variety of other illnesses carried by ticks.[137] Doxycycline is contraindicated in children younger than eight years of age and women who are pregnant or breastfeeding;[137] alternatives to doxycycline are amoxicillin, cefuroxime axetil, and azithromycin.[137] Individuals with early disseminated or late infection may have symptomatic cardiac disease, refractory Lyme arthritis, or neurologic symptoms like meningitis or encephalitis.[137] Intravenous administration of ceftriaxone is recommended as the first choice in these cases;[137] cefotaxime and doxycycline are available as alternatives.[137]

These treatment regimens last from one to four weeks.[137] If joint swelling persists or returns, a second round of antibiotics may be considered.[137] Outside of that, a prolonged antibiotic regimen lasting more than 28 days is not recommended as no clinical evidence shows it to be effective.[137][139] IgM and IgG antibody levels may be elevated for years even after successful treatment with antibiotics.[137] As antibody levels are not indicative of treatment success, testing for them is not recommended.[137]',
                'symptoms' => 'Lyme disease can affect multiple body systems and produce a broad range of symptoms. Not all patients with Lyme disease have all symptoms, and many of the symptoms are not specific to Lyme disease, but can occur with other diseases, as well. The incubation period from infection to the onset of symptoms is usually one to two weeks, but can be much shorter (days), or much longer (months to years).[19]

Symptoms most often occur from May to September, because the nymphal stage of the tick is responsible for most cases.[19] Asymptomatic infection exists, but occurs in less than 7% of infected individuals in the United States.[20] Asymptomatic infection may be much more common among those infected in Europe.[21]',
                'picture' => 'lyme_disease.jpg',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'disease_name' => 'Hepatitis C',
                'category' => 'Infections',
                'treatment' => 'HCV induces chronic infection in 80% of infected persons.[1] Approximately 95% of these clear with treatment.[4] In rare cases, infection can clear without treatment.[17] Those with chronic hepatitis C are advised to avoid medications toxic to the liver and alcohol.[15] They should be vaccinated against hepatitis A and hepatitis B.[15] Use of acetaminophen is generally considered safe at reduced doses.[10] Nonsteroidal anti-inflammatory drugs (NSAIDs) are not recommended in those with advanced liver disease due to an increased risk of bleeding.[10] Ultrasound surveillance for hepatocellular carcinoma is recommended in those with accompanying cirrhosis.[15] Coffee consumption has been associated with a slower rate of liver scarring in those infected with HCV.[10]',
                'symptoms' => 'Hepatitis C infection causes acute symptoms in 15% of cases.[14] Symptoms are generally mild and vague, including a decreased appetite, fatigue, nausea, muscle or joint pains, and weight loss[15] and rarely does acute liver failure result.[16] Most cases of acute infection are not associated with jaundice.[17] The infection resolves spontaneously in 10–50% of cases, which occurs more frequently in individuals who are young and female.[17]',
                'picture' => 'hepatitis_C.jpeg',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'disease_name' => 'Sepsis',
                'category' => 'Infections',
                'treatment' => 'Approximately 20–35% of people with severe sepsis and 30–70% of people with septic shock die.[81] Lactate is a useful method of determining prognosis, with those who have a level greater than 4 mmol/L having a mortality of 40% and those with a level of less than 2 mmol/L having a mortality of less than 15%.[27]

There are a number of prognostic stratification systems, such as APACHE II and Mortality in Emergency Department Sepsis. APACHE II factors in the person\'s age, underlying condition, and various physiologic variables to yield estimates of the risk of dying of severe sepsis. Of the individual covariates, the severity of underlying disease most strongly influences the risk of death. Septic shock is also a strong predictor of short- and long-term mortality. Case-fatality rates are similar for culture-positive and culture-negative severe sepsis. The Mortality in Emergency Department Sepsis (MEDS) score is simpler, and useful in the emergency department environment.[82]

Some people may experience severe long-term cognitive decline following an episode of severe sepsis, but the absence of baseline neuropsychological data in most people with sepsis makes the incidence of this difficult to quantify or to study.[83]',
                'symptoms' => 'In addition to symptoms related to the provoking cause, sepsis is frequently associated with either fever, low body temperature, rapid breathing, elevated heart rate, confusion, and edema.[14] Early signs are a rapid heart rate, decreased urination, and high blood sugar. Signs of established sepsis include confusion, metabolic acidosis (which may be accompanied by faster breathing and lead to a respiratory alkalosis), low blood pressure due to decreased systemic vascular resistance, higher cardiac output, and dysfunctions of blood coagulation (where clotting may lead to organ failure).[15]

The drop in blood pressure seen in sepsis may lead to shock. This may result in light-headedness. Bruising or intense bleeding may occur.[16]',
                'picture' => 'sepsis.jpg',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'disease_name' => 'Tuberculosis',
                'category' => 'Infections',
                'treatment' => 'Tuberculosis prevention and control efforts rely primarily on the vaccination of infants and the detection and appropriate treatment of active cases.[14] The World Health Organization has achieved some success with improved treatment regimens, and a small decrease in case numbers.[14] The US Preventive Services Task Force (USPSTF) recommends screening people who are at high risk for latent tuberculosis with either tuberculin skin tests or interferon-gamma release assays.[78]',
                'symptoms' => 'Tuberculosis may infect any part of the body, but most commonly occurs in the lungs (known as pulmonary tuberculosis).[6] Extrapulmonary TB occurs when tuberculosis develops outside of the lungs, although extrapulmonary TB may coexist with pulmonary TB.[6]

General signs and symptoms include fever, chills, night sweats, loss of appetite, weight loss, and fatigue.[6] Significant nail clubbing may also occur.[16]',
                'picture' => 'tuberculosis.jpg',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'disease_name' => 'Alzheimer\'s disease',
                'category' => 'Degenerative',
                'treatment' => 'There is no cure for Alzheimer\'s disease; available treatments offer relatively small symptomatic benefit but remain palliative in nature. Current treatments can be divided into pharmaceutical, psychosocial and caregiving.',
                'symptoms' => 'The disease course is divided into four stages, with a progressive pattern of cognitive and functional impairment.',
                'picture' => 'alzheimer.jpg',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'disease_name' => 'Scurvy',
                'category' => 'Deficiency',
                'treatment' => 'Scurvy can be prevented by a diet that includes vitamin C-rich foods such as bell peppers (sweet peppers), blackcurrants, broccoli, chili peppers, guava, kiwifruit, and parsley. Other sources rich in vitamin C are fruits such as lemons, limes, oranges, papaya, and strawberries. It is also found in vegetables, such as brussels sprouts, cabbage, potatoes, and spinach. Some fruits and vegetables not high in vitamin C may be pickled in lemon juice, which is high in vitamin C. Though redundant in the presence of a balanced diet,[17] various nutritional supplements are available that provide ascorbic acid well in excess of that required to prevent scurvy.',
                'symptoms' => 'Early symptoms are malaise and lethargy. Even earlier might be a pain in a section of the gums which interferes with digestion. After one to three months, patients develop shortness of breath and bone pain. Myalgias may occur because of reduced carnitine production. Other symptoms include skin changes with roughness, easy bruising and petechiae, gum disease, loosening of teeth, poor wound healing, and emotional changes (which may appear before any physical changes). Dry mouth and dry eyes similar to Sjögren\'s syndrome may occur. In the late stages, jaundice, generalized edema, oliguria, neuropathy, fever, convulsions, and eventual death are frequently seen.[8]',
                'picture' => 'scurvy.png',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'disease_name' => 'Stroke',
                'category' => 'Non-Infectious',
                'treatment' => 'Disability affects 75% of stroke survivors enough to decrease their employability.[175] Stroke can affect people physically, mentally, emotionally, or a combination of the three. The results of stroke vary widely depending on size and location of the lesion.[176] Dysfunctions correspond to areas in the brain that have been damaged.

Some of the physical disabilities that can result from stroke include muscle weakness, numbness, pressure sores, pneumonia, incontinence, apraxia (inability to perform learned movements), difficulties carrying out daily activities, appetite loss, speech loss, vision loss and pain. If the stroke is severe enough, or in a certain location such as parts of the brainstem, coma or death can result.',
                'symptoms' => 'Stroke symptoms typically start suddenly, over seconds to minutes, and in most cases do not progress further. The symptoms depend on the area of the brain affected. The more extensive the area of the brain affected, the more functions that are likely to be lost. Some forms of stroke can cause additional symptoms. For example, in intracranial hemorrhage, the affected area may compress other structures. Most forms of stroke are not associated with a headache, apart from subarachnoid hemorrhage and cerebral venous thrombosis and occasionally intracerebral hemorrhage.',
                'picture' => 'stroke.jpg',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'disease_name' => 'Hypothermia',
                'category' => 'Social',
                'treatment' => 'It is usually recommended not to declare a person dead until their body is warmed to a near normal body temperature of greater than 32 °C (90 °F),[2] since extreme hypothermia can suppress heart and brain function.[70] Exceptions include if there is an obvious fatal injuries or the chest is frozen so that it cannot be compressed.[48] If a person was buried in an avalanche for more than 35 minutes and is found with a mouth packed full of snow without a pulse, stopping early may also be reasonable.[2] This is also the case if a person\'s blood potassium is greater than 12 mmol/l.[2]',
                'symptoms' => 'Signs and symptoms vary depending on the degree of hypothermia, and may be divided by the three stages of severity. Infants with hypothermia may feel cold when touched, with bright red skin and an unusual lack of energy.',
                'picture' => 'hypothermia.jpeg',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],
            [
                'disease_name' => 'Schizophrenia',
                'category' => 'Mental',
                'treatment' => 'The primary treatment of schizophrenia is antipsychotic medications, often in combination with psychological and social supports.[9] Hospitalization may occur for severe episodes either voluntarily or (if mental health legislation allows it) involuntarily. Long-term hospitalization is uncommon since deinstitutionalization beginning in the 1950s, although it still occurs.[16] Community support services including drop-in centers, visits by members of a community mental health team, supported employment[135] and support groups are common. Some evidence indicates that regular exercise has a positive effect on the physical and mental health of those with schizophrenia.[136] As of 2015 it is unclear if transcranial magnetic stimulation (TMS) is useful for schizophrenia.[137]',
                'symptoms' => 'Individuals with schizophrenia may experience hallucinations (most reported are hearing voices), delusions (often bizarre or persecutory in nature), and disorganized thinking and speech. The last may range from loss of train of thought, to sentences only loosely connected in meaning, to speech that is not understandable known as word salad. Social withdrawal, sloppiness of dress and hygiene, and loss of motivation and judgment are all common in schizophrenia.[21]',
                'picture' => 'schizophrenia.jpeg',
                'created_at' => $this->rendDateTime(),
                'updated_at' => $this->rendDateTime(),
            ],

        ]);
    }
}
