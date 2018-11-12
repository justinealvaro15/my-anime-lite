
CREATE TABLE Genre(
	genre_name		TEXT,
	genre_desc		TEXT,
	PRIMARY KEY (genre_name)
);

/* source: https://myanimelist.net/info.php?go=genre */

INSERT INTO Genre VALUES
('Action', 'Plays out mainly through a clash of physical forces. Frequently these stories have fast cuts, tough characters making quick decisions and usually a beautiful girl nearby. Anything quick and most likely a thin storyline.'),

('Adventure', 'Exploring new places, environments or situations. This is often associated with people on long journeys to places far away encountering amazing things, usually not in an epic but in a rather gripping and interesting way.'),

('Cars', 'Anime whose central theme revolves around cars and probably car races. A single character''s obsession for cars does not mean that it should belong to this genre. Most of these stories also are in the action genre.'),

('Comedy', 'Multiple characters and/or events causing hilarious results. These stories are built upon funny characters, situations and events.'),

('Dementia', 'Anime that have mind-twisting plots.'),

('Demons', 'Anime that are set in a world where demons and other dark creatures play a significant role - the main character may even be one.'),

('Drama', 'Anime that often show life or characters through conflict and emotions. In general, the different parts of the story tend to form a whole that is greater than the sum of the parts. In other words, the story has a message that is bigger than just the story line itself.'),

('Fantasy', 'Anime that are set in a mythical world quite different from modern-day Earth. Frequently this world has magic and/or mythical creatures such as dragons and unicorns. These stories are sometimes based on real world legends and myths. Frequently fantasies describe tales featuring magic, brave knights, damsels in distress, and/or quests.'),

('Game', 'Anime whose central theme is based on a non-violent, non-sports game, like go, chess, trading card games or computer/video games.'),

('Historical', 'Anime whose setting is in the past. Frequently these follow historical tales, sagas or facts.'),

('Horror', 'Anime whose focus is to scare the audience.'),

('Josei', 'Josei is actually a demographic but is also considered a general category in anime. It specifically targets female viewers around the age range of 18-40. These shows depict life and romance in a more mature light, usually with more grounded realism and less idealistic fantasies. The subgenre is fairly wide and doesn''t necessarily have to focus on romance.'),

('Kids', 'Anime whose target audience is children. This does not necessarily mean that the character(s) are children or that an anime whose main character(s) are children is appropriate for this genre.'),

('Magic', 'Anime whose central theme revolves around magic. Things that are "out of this world" happen - incidents that cannot be explained by the laws of nature or science. Usually wizards/witches indicate that it is of the "Magic" type. This is a sub-genre of fantasy.'),

('Martial Arts', 'Anime whose central theme revolves around martial arts. This includes all hand-to-hand fighting styles, including Karate, Tae-Kwon-Do and even Boxing. Weapons use, like Nunchaku and Shuriken are also indications of this genre. This is a sub-genre of action.'),

('Mecha', 'Anime whose central theme involves mechanical things. This genre is mainly used to point out when there are giant robots. Human size androids are in general not considered "Mecha" but "SciFi".'),

('Military', 'An anime series/movie that has a heavy militaristic feel behind it.'),

('Music', 'Anime whose central theme revolves around singers/idols or people playing instruments. This category is not intended for finding AMVs (Animated Music Videos).'),

('Mystery', 'Anime where characters reveal secrets that may lead a solution for a great mystery. This is not necessarily solving a crime, but can be a realization after a quest.'),

('Parody', 'Anime that imitate other stories (can be from TV, film, books, historical events, ...) for comic effect by exaggerating the style and changing the content of the original. Also known as spoofs. This is a sub-genre of comedy.'),

('Police', 'Anime where a police organization are a major part of the story.'),

('Psychological', 'Often when two or more characters prey each others'' minds, either by playing deceptive games with the other or by merely trying to demolish the other''s mental state.'),

('Romance', 'Anime whose story is about two people who each want [sometimes unconciously] to win or keep the love of the other. This kind of anime might also fall in the "Ecchi" category, while "Romance" and "Hentai" generally contradict each other.'),

('Samurai', 'Anime whose main character(s) are samurai, the old, but not forgotten, warrior cast of medieval Japan.'),

('School', 'Anime which are mainly set in a school environment.'),

('Sci-Fi', 'Anime where the setting is based on the technology and tools of a scientifically imaginable world. The majority of technologies presented are not available in the present day and therefore the Science is Fiction. This incorporates any possible place (planets, space, underwater, you name it).'),

('Seinen', 'Seinen is actually a demographic but is also considered to be a category in anime. It’s a subgenre that specifically targets male viewers around the age range of 18-40. The shows here are depicted in a more mature light and often include more explicit content such as gore, sex, and violence. More cerebral narratives are present as well.'),

('Shoujo', 'Anime that are targeted towards the "young girl" market. Usually the story is from the point of view of a girl and deals with romance, drama or magic.'),

('Shoujo Ai', 'Anime whose central theme is about a relationship (or strong affection, not usually sexual) between two girls or women. Shoujo Ai literally means "girl love".'),

('Shounen', 'Anime that are targeted towards the "young boy" market. The usual topics for this involve fighting, friendship and sometimes super powers.'),

('Shounen Ai', 'Anime whose central theme is about a relationship (or strong affection, not usually sexual) between two boys or men. Shounen Ai literally means "boy love", but could be expressed as "male bonding".'),

('Slice of Life', 'Anime with no clear central plot. This type of anime tends to be naturalistic and mainly focuses around the main characters and their everyday lives. Often there will be some philosophical perspectives regarding love, relationships, life etc. tied into the anime. The overall typical moods for this type of anime are cheery and carefree, in other words, it is your "feel-good" kind of anime.'),

('Space', 'Anime whose setting is in outer space, not on another planet, nor in another dimension, but space. This is a sub-genre of scifi.'),

('Sports', 'Anime whose central theme revolves around sports, examples are tennis, boxing and basketball.'),

('Super Power', 'Anime whose main character(s) have powers beyond normal humans. Often it looks like magic, but can''t really be considered magic; usually ki-attacks, flying or superhuman strength.'),

('Supernatural', 'Anime of the paranormal stature. Demons, vampires, ghosts, undead, etc.'),

('Thriller', 'Psychological thrillers are action-packed dramas that often focus on the unstable mental state of their characters. There''s significant crossover with the mystery, slasher, and horror anime genres. Because the content is often pretty disturbing, this anime is often geared towards adults.'),

('Vampire', 'Anime whose main character(s) are vampires or at least vampires play a significant role in the story.'),


/* NO */
('Ecchi',null),
('Harem',null),
('Hentai',null),
('Yaoi',null),
('Yuri',null);
