<?

//url rewriting
function url_rewrite($s){
	$r=str_replace("<br>","",strtolower(trim($s)));
	$r=str_replace("<br/>","",$r);
	$r=str_replace("<br />","",$r);
	$r=str_replace(chr(0),"",$r);
	$r=str_replace(chr(1),"",$r);
	$r=str_replace(chr(2),"",$r);
	$r=str_replace(chr(3),"",$r);
	$r=str_replace(chr(4),"",$r);
	$r=str_replace(chr(5),"",$r);
	$r=str_replace(chr(6),"",$r);
	$r=str_replace(chr(7),"",$r);
	$r=str_replace(chr(8),"",$r);
	$r=str_replace(chr(9),"",$r);
	$r=str_replace(chr(10),"",$r);
	$r=str_replace(chr(11),"",$r);
	$r=str_replace(chr(12),"",$r);
	$r=str_replace(chr(13),"",$r);
	$r=str_replace(chr(14),"",$r);
	$r=str_replace(chr(15),"",$r);
	$r=str_replace(chr(16),"",$r);
	$r=str_replace(chr(17),"",$r);
	$r=str_replace(chr(18),"",$r);
	$r=str_replace(chr(19),"",$r);
	$r=str_replace(chr(20),"",$r);
	$r=str_replace(chr(21),"",$r);
	$r=str_replace(chr(22),"",$r);
	$r=str_replace(chr(23),"",$r);
	$r=str_replace(chr(24),"",$r);
	$r=str_replace(chr(25),"",$r);
	$r=str_replace(chr(26),"",$r);
	$r=str_replace(chr(27),"",$r);
	$r=str_replace(chr(28),"",$r);
	$r=str_replace(chr(29),"",$r);
	$r=str_replace(chr(30),"",$r);
	$r=str_replace(chr(31),"",$r);
	$r=str_replace(chr(32),"-",$r);
	$r=str_replace(chr(33),"-",$r);
	$r=str_replace(chr(34),"-",$r);
	$r=str_replace(chr(35),"-",$r);
	$r=str_replace(chr(36),"dollar",$r);
	$r=str_replace(chr(37),"pourcent",$r);
	$r=str_replace(chr(38),"et",$r);
	$r=str_replace(chr(39),"-",$r);
	$r=str_replace(chr(40),"-",$r);
	$r=str_replace(chr(41),"-",$r);
	$r=str_replace(chr(42),"-",$r);
	$r=str_replace(chr(43),"-",$r);
	$r=str_replace(chr(44),"-",$r);
	$r=str_replace(chr(45),"-",$r);
	$r=str_replace(chr(46),"-",$r);
	$r=str_replace(chr(47),"-",$r);
	$r=str_replace(chr(48),"0",$r);
	$r=str_replace(chr(49),"1",$r);
	$r=str_replace(chr(50),"2",$r);
	$r=str_replace(chr(51),"3",$r);
	$r=str_replace(chr(52),"4",$r);
	$r=str_replace(chr(53),"5",$r);
	$r=str_replace(chr(54),"6",$r);
	$r=str_replace(chr(55),"7",$r);
	$r=str_replace(chr(56),"8",$r);
	$r=str_replace(chr(57),"9",$r);
	$r=str_replace(chr(58),"-",$r);
	$r=str_replace(chr(59),"-",$r);
	$r=str_replace(chr(60),"-",$r);
	$r=str_replace(chr(61),"-",$r);
	$r=str_replace(chr(62),"-",$r);
	$r=str_replace(chr(63),"-",$r);
	$r=str_replace(chr(64),"-",$r);
	$r=str_replace(chr(65),"a",$r);
	$r=str_replace(chr(66),"b",$r);
	$r=str_replace(chr(67),"c",$r);
	$r=str_replace(chr(68),"d",$r);
	$r=str_replace(chr(69),"e",$r);
	$r=str_replace(chr(70),"f",$r);
	$r=str_replace(chr(71),"g",$r);
	$r=str_replace(chr(72),"h",$r);
	$r=str_replace(chr(73),"i",$r);
	$r=str_replace(chr(74),"j",$r);
	$r=str_replace(chr(75),"k",$r);
	$r=str_replace(chr(76),"l",$r);
	$r=str_replace(chr(77),"m",$r);
	$r=str_replace(chr(78),"n",$r);
	$r=str_replace(chr(79),"o",$r);
	$r=str_replace(chr(80),"p",$r);
	$r=str_replace(chr(81),"q",$r);
	$r=str_replace(chr(82),"r",$r);
	$r=str_replace(chr(83),"s",$r);
	$r=str_replace(chr(84),"t",$r);
	$r=str_replace(chr(85),"u",$r);
	$r=str_replace(chr(86),"v",$r);
	$r=str_replace(chr(87),"w",$r);
	$r=str_replace(chr(88),"x",$r);
	$r=str_replace(chr(89),"y",$r);
	$r=str_replace(chr(90),"z",$r);
	$r=str_replace(chr(91),"-",$r);
	$r=str_replace(chr(92),"-",$r);
	$r=str_replace(chr(93),"-",$r);
	$r=str_replace(chr(94),"-",$r);
	$r=str_replace(chr(95),"-",$r);
	$r=str_replace(chr(96),"-",$r);
	$r=str_replace(chr(97),"a",$r);
	$r=str_replace(chr(98),"b",$r);
	$r=str_replace(chr(99),"c",$r);
	$r=str_replace(chr(100),"d",$r);
	$r=str_replace(chr(101),"e",$r);
	$r=str_replace(chr(102),"f",$r);
	$r=str_replace(chr(103),"g",$r);
	$r=str_replace(chr(104),"h",$r);
	$r=str_replace(chr(105),"i",$r);
	$r=str_replace(chr(106),"j",$r);
	$r=str_replace(chr(107),"k",$r);
	$r=str_replace(chr(108),"l",$r);
	$r=str_replace(chr(109),"m",$r);
	$r=str_replace(chr(110),"n",$r);
	$r=str_replace(chr(111),"o",$r);
	$r=str_replace(chr(112),"p",$r);
	$r=str_replace(chr(113),"q",$r);
	$r=str_replace(chr(114),"r",$r);
	$r=str_replace(chr(115),"s",$r);
	$r=str_replace(chr(116),"t",$r);
	$r=str_replace(chr(117),"u",$r);
	$r=str_replace(chr(118),"v",$r);
	$r=str_replace(chr(119),"w",$r);
	$r=str_replace(chr(120),"x",$r);
	$r=str_replace(chr(121),"y",$r);
	$r=str_replace(chr(122),"z",$r);
	$r=str_replace(chr(123),"-",$r);
	$r=str_replace(chr(124),"-",$r);
	$r=str_replace(chr(125),"-",$r);
	$r=str_replace(chr(126),"-",$r);
	$r=str_replace(chr(127),"",$r);
	$r=str_replace(chr(128),"euro",$r);
	//$r=str_replace(chr(129),"",$r);
	$r=str_replace(chr(130),"-",$r);
	$r=str_replace(chr(131),"f",$r);
	$r=str_replace(chr(132),"-",$r);
	$r=str_replace(chr(133),"-",$r);
	$r=str_replace(chr(134),"-",$r);
	$r=str_replace(chr(135),"-",$r);
	$r=str_replace(chr(136),"-",$r);
	$r=str_replace(chr(137),"pour mille",$r);
	$r=str_replace(chr(138),"s",$r);
	$r=str_replace(chr(139),"-",$r);
	$r=str_replace(chr(140),"oe",$r);
	$r=str_replace(chr(141),"",$r);
	$r=str_replace(chr(142),"z",$r);
	$r=str_replace(chr(143),"",$r);
	$r=str_replace(chr(144),"",$r);
	$r=str_replace(chr(145),"-",$r);
	$r=str_replace(chr(146),"-",$r);
	$r=str_replace(chr(147),"-",$r);
	$r=str_replace(chr(148),"-",$r);
	$r=str_replace(chr(149),"-",$r);
	$r=str_replace(chr(150),"-",$r);
	$r=str_replace(chr(151),"-",$r);
	$r=str_replace(chr(152),"-",$r);
	$r=str_replace(chr(153),"-",$r);
	$r=str_replace(chr(154),"s",$r);
	$r=str_replace(chr(155),"-",$r);
	$r=str_replace(chr(156),"oe",$r);
	$r=str_replace(chr(157),"",$r);
	$r=str_replace(chr(158),"z",$r);
	$r=str_replace(chr(159),"y",$r);
	$r=str_replace(chr(160),"-",$r);
	$r=str_replace(chr(161),"-",$r);
	$r=str_replace(chr(162),"-",$r);
	$r=str_replace(chr(163),"-",$r);
	$r=str_replace(chr(164),"-",$r);
	$r=str_replace(chr(165),"-",$r);
	$r=str_replace(chr(166),"-",$r);
	$r=str_replace(chr(167),"-",$r);
	$r=str_replace(chr(168),"-",$r);
	$r=str_replace(chr(169),"-",$r);
	$r=str_replace(chr(170),"-",$r);
	$r=str_replace(chr(171),"-",$r);
	$r=str_replace(chr(172),"-",$r);
	$r=str_replace(chr(173),"-",$r);
	$r=str_replace(chr(174),"-",$r);
	$r=str_replace(chr(175),"-",$r);
	$r=str_replace(chr(176),"-",$r);
	$r=str_replace(chr(177),"-",$r);
	$r=str_replace(chr(178),"-",$r);
	$r=str_replace(chr(179),"-",$r);
	$r=str_replace(chr(180),"-",$r);
	$r=str_replace(chr(181),"-",$r);
	$r=str_replace(chr(182),"-",$r);
	$r=str_replace(chr(183),"-",$r);
	$r=str_replace(chr(184),"-",$r);
	$r=str_replace(chr(185),"-",$r);
	$r=str_replace(chr(186),"-",$r);
	$r=str_replace(chr(187),"-",$r);
	$r=str_replace(chr(188),"-",$r);
	$r=str_replace(chr(189),"-",$r);
	$r=str_replace(chr(190),"-",$r);
	$r=str_replace(chr(191),"-",$r);
	$r=str_replace(chr(192),"a",$r);
	$r=str_replace(chr(193),"a",$r);
	$r=str_replace(chr(194),"a",$r);
	$r=str_replace(chr(195),"a",$r);
	$r=str_replace(chr(196),"a",$r);
	$r=str_replace(chr(197),"a",$r);
	$r=str_replace(chr(198),"ae",$r);
	$r=str_replace(chr(199),"c",$r);
	$r=str_replace(chr(200),"e",$r);
	$r=str_replace(chr(201),"e",$r);
	$r=str_replace(chr(202),"e",$r);
	$r=str_replace(chr(203),"e",$r);
	$r=str_replace(chr(204),"i",$r);
	$r=str_replace(chr(205),"i",$r);
	$r=str_replace(chr(206),"i",$r);
	$r=str_replace(chr(207),"i",$r);
	$r=str_replace(chr(208),"",$r);
	$r=str_replace(chr(209),"n",$r);
	$r=str_replace(chr(210),"o",$r);
	$r=str_replace(chr(211),"o",$r);
	$r=str_replace(chr(212),"o",$r);
	$r=str_replace(chr(213),"o",$r);
	$r=str_replace(chr(214),"o",$r);
	$r=str_replace(chr(215),"fois",$r);
	$r=str_replace(chr(216),"o",$r);
	$r=str_replace(chr(217),"u",$r);
	$r=str_replace(chr(218),"u",$r);
	$r=str_replace(chr(219),"u",$r);
	$r=str_replace(chr(220),"u",$r);
	$r=str_replace(chr(221),"y",$r);
	$r=str_replace(chr(222),"",$r);
	$r=str_replace(chr(223),"",$r);
	$r=str_replace(chr(224),"a",$r);
	$r=str_replace(chr(225),"a",$r);
	$r=str_replace(chr(226),"a",$r);
	$r=str_replace(chr(227),"a",$r);
	$r=str_replace(chr(228),"a",$r);
	$r=str_replace(chr(229),"a",$r);
	$r=str_replace(chr(230),"ae",$r);
	$r=str_replace(chr(231),"c",$r);
	$r=str_replace(chr(232),"e",$r);
	$r=str_replace(chr(233),"e",$r);
	$r=str_replace(chr(234),"e",$r);
	$r=str_replace(chr(235),"e",$r);
	$r=str_replace(chr(236),"i",$r);
	$r=str_replace(chr(237),"i",$r);
	$r=str_replace(chr(238),"i",$r);
	$r=str_replace(chr(239),"i",$r);
	$r=str_replace(chr(240),"",$r);
	$r=str_replace(chr(241),"n",$r);
	$r=str_replace(chr(242),"o",$r);
	$r=str_replace(chr(243),"o",$r);
	$r=str_replace(chr(244),"o",$r);
	$r=str_replace(chr(245),"o",$r);
	$r=str_replace(chr(246),"o",$r);
	$r=str_replace(chr(247),"divise",$r);
	$r=str_replace(chr(248),"o",$r);
	$r=str_replace(chr(249),"u",$r);
	$r=str_replace(chr(250),"u",$r);
	$r=str_replace(chr(251),"u",$r);
	$r=str_replace(chr(252),"u",$r);
	$r=str_replace(chr(253),"y",$r);
	$r=str_replace(chr(254),"",$r);
	$r=str_replace(chr(255),"y",$r);
	return $r;
}
?>