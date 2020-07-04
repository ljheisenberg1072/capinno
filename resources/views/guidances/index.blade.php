@extends('layouts.app')
@section('title', '参赛指引')

@section('content')
    <section class="campaign-schedule">
        <div class="container">
            <div class="row mt-100 mb-100">
                <div class="col-lg-12">
                    <div class="schedule-header text-center">
                        <h2>参赛流程</h2>
                    </div>
                    <div class="schedule-body row text-center justify-content-center mt-5">
                        <div class="col-lg-2 col-6 schedule-item">
                            <div class="top">
                                <div class="img">
                                    <span><i class="iconfont icon-duoren" style="font-size: 40px;"></i></span>
                                </div>
                            </div>
                            <div class="schedule-name">初赛</div>
                            <p class="schedule-time">9月16日~10月13日</p>
                            <p class="schedule-event">设计创意提案提交 评审</p>
                        </div>
                        <div class="col-lg-2 col-6 schedule-item">
                            <div class="top">
                                <div class="img">
                                    <span><i class="iconfont icon-taotaisai01" style="font-size: 40px;"></i></span>
                                </div>
                            </div>
                            <div class="schedule-name">复赛</div>
                            <p class="schedule-time">10月28日~11月29日</p>
                            <p class="schedule-event">产品商业计划书提交 评审</p>
                        </div>
                        <div class="col-lg-2 col-6 schedule-item">
                            <div class="top">
                                <div class="img">
                                    <span><i class="iconfont icon-bisai" style="font-size: 40px;"></i></span>
                                </div>
                            </div>
                            <div class="schedule-name">决赛答辩</div>
                            <p class="schedule-time">2020年1月</p>
                            <p class="schedule-event">样品提交 + 决赛现场答辩</p>
                        </div>
                        <div class="col-lg-2 col-6 schedule-item">
                            <div class="top">
                                <div class="img">
                                    <span><i class="iconfont icon-mianshi" style="font-size: 40px;"></i></span>
                                </div>
                            </div>
                            <div class="schedule-name">创业面试</div>
                            <p class="schedule-time">2020年1月</p>
                            <p class="schedule-event">创业营选拔</p>
                        </div>
                        <div class="col-lg-2 col-6 schedule-item">
                            <div class="top">
                                <div class="img">
                                    <span><i class="iconfont icon-bisai1" style="font-size: 40px;"></i></span>
                                </div>
                            </div>
                            <div class="schedule-name">商业路演(总决赛)</div>
                            <p class="schedule-time">2020年4月</p>
                            <p class="schedule-event">FBIC 现场路演</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="campaign-category" style="background-image: url('/images/category/background.png')">
        <div class="container">
            <div class="row">
                <div class="col-12 my-5">
                    <ul class="nav nav-pills mb-5 justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-snack-tab" data-toggle="pill" href="#pills-snack" role="tab" aria-controls="pills-snack" aria-selected="true">零食</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-beverage-tab" data-toggle="pill" href="#pills-beverage" role="tab" aria-controls="pills-beverage" aria-selected="false">饮料</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-dairy-tab" data-toggle="pill" href="#pills-dairy" role="tab" aria-controls="pills-dairy" aria-selected="false">乳及乳制品</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-candy-tab" data-toggle="pill" href="#pills-candy" role="tab" aria-controls="pills-candy" aria-selected="false">糖果&巧克力</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-bakery-tab" data-toggle="pill" href="#pills-bakery" role="tab" aria-controls="pills-bakery" aria-selected="false">烘焙</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-functional-tab" data-toggle="pill" href="#pills-functional" role="tab" aria-controls="pills-functional" aria-selected="false">功能性食品</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-service-tab" data-toggle="pill" href="#pills-service" role="tab" aria-controls="pills-service" aria-selected="false">餐饮&餐饮+</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-taste-tab" data-toggle="pill" href="#pills-taste" role="tab" aria-controls="pills-taste" aria-selected="false">中国味道</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-experience-tab" data-toggle="pill" href="#pills-experience" role="tab" aria-controls="pills-experience" aria-selected="false">食物体验</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-snack" role="tabpanel" aria-labelledby="pills-snack-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <img src="/images/category/snack.png" alt="零食">
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <p>零食:</p>
                                    <p>二级品类参考:</p>
                                    <p>营养棒（能量/代餐/蛋白棒或球等）、谷物类零食、薯类零食、豆类零食、果蔬类零食、肉类零食、其他零食等</p>
                                    <p>品类解析将在创新寻访结束后更新。</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-beverage" role="tabpanel" aria-labelledby="pills-beverage-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <img src="/images/category/beverage.png" alt="饮料">
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <p>饮料:</p>
                                    <p>二级品类参考:</p>
                                    <p>茶及茶饮料、咖啡及咖啡饮料、植物蛋白饮料、含酒精饮料、果蔬饮料、能量与功能饮料、调味水、气泡水与草本饮料、固体与代餐饮料等</p>
                                    <p>品类解析将在创新寻访结束后更新</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-dairy" role="tabpanel" aria-labelledby="pills-dairy-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <img src="/images/category/dairy.png" alt="乳及乳制品">
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <p>乳及乳制品:</p>
                                    <p>二级品类参考:</p>
                                    <p>酸奶与酸奶饮品、牛奶和乳饮料、奶酪及奶酪制品、乳脂类产品、乳基零食、乳基甜点与冰淇淋等</p>
                                    <p>品类解析将在创新寻访结束后更新</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-candy" role="tabpanel" aria-labelledby="pills-candy-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <img src="/images/category/candy.png" alt="糖果&巧克力">
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <p>糖果&巧克力:</p>
                                    <p>二级品类参考:</p>
                                    <p>巧克力及巧克力制品、胶基糖果类、压片糖果类、硬质糖果类、果冻和布丁、其他糖果类等</p>
                                    <p>品类解析将在创新寻访结束后更新</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-bakery" role="tabpanel" aria-labelledby="pills-bakery-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <img src="/images/category/bakery.png" alt="烘焙">
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <p>烘焙:</p>
                                    <p>二级品类参考:</p>
                                    <p>饼干、蛋糕、糕点、点心、面包和面包制品、烘焙原料和混合拌料等</p>
                                    <p>品类解析将在创新寻访结束后更新</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-functional" role="tabpanel" aria-labelledby="pills-functional-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <img src="/images/category/functional.png" alt="功能性食品">
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <p>功能性食品:</p>
                                    <p>二级品类参考:</p>
                                    <p>婴幼儿配方食品、膳食补充剂、特殊人群膳食、特殊功能宣称食品、运动营养食品等</p>
                                    <p>品类解析将在创新寻访结束后更新</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-service" role="tabpanel" aria-labelledby="pills-service-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <img src="/images/category/service.png" alt="餐饮&餐饮+">
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <p>餐饮&餐饮+:</p>
                                    <p>二级品类参考:</p>
                                    <p>汤、酱、调味品、沙拉与净菜、鱼肉蛋制品、方便食品、早餐谷物、 其他餐饮原料等</p>
                                    <p>品类解析将在创新寻访结束后更新</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-taste" role="tabpanel" aria-labelledby="pills-taste-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <img src="/images/category/taste.png" alt="中国味道">
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <p>中国味道:</p>
                                    <p>二级品类参考:</p>
                                    <p>地方特色食材深加工、中式糕点、伴手礼场景等</p>
                                    <p>品类解析将在创新寻访结束后更新</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-experience" role="tabpanel" aria-labelledby="pills-experience-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 text-center">
                                    <img src="/images/category/experience.png" alt="食物体验">
                                </div>
                                <div class="col-lg-6 mt-5">
                                    <p>食物体验:</p>
                                    <p>二级品类参考:</p>
                                    <p>食“器”：食物器皿或工具，如何促进美食体验？</p>
                                    <p>食“用”：美食新用途，除了吃还能做游戏、做启蒙...？</p>
                                    <p>食“景”：美食服务体系，创造或改善服务场景？</p>
                                    <p>品类解析将在创新寻访结束后更新</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="campaign-file">
        <div class="container">
            <div class="row mt-100 mb-100 text-center">
                <div class="file-header col-lg-12 mb-5">
                    <h2>相关文件下载</h2>
                </div>
                <div class="col-lg-12 mt-4">
                    <h4>- 大赛章程类文件 -</h4>
                    <p>大赛章程类文件下载<a href="#"><i class="iconfont icon-icclouddownload"></i></a></p>
                </div>
                <div class="col-lg-12 mt-4">
                    <h4>- 提交模板类文件 -</h4>
                    <p>初赛提交文件下载<a href="#"><i class="iconfont icon-icclouddownload"></i></a></p>
                    <p>复赛提交文件下载<a href="#"><i class="iconfont icon-icclouddownload"></i></a></p>
                    <p>决赛提交文件下载<a href="#"><i class="iconfont icon-icclouddownload"></i></a></p>
                </div>
            </div>
        </div>
    </section>
    <section class="campaign-award" style="background-image: url('/images/category/background.png')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="award-header text-center mb-5">
                        <h2>奖项设置</h2>
                    </div>
                </div>
                <div class="col-lg-12 mb-5">
                    <div class="award-begin text-center">
                        <h4>- 初赛 -</h4>
                    </div>
                </div>
                <div class="col-lg-6 text-center mb-4">
                    <div class="col-lg-12 mb-4">
                        <h4>大陆地区（学生）</h4>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">类项</th>
                            <th scope="col">奖金</th>
                            <th scope="col">数量</th>
                        </tr>
                        </thead>
                        <tbody class="table-borderless">
                        <tr>
                            <td>一等奖</td>
                            <td>10,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>二等奖</td>
                            <td>5,000</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>三等奖</td>
                            <td>3,000</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>入围奖</td>
                            <td>1,000</td>
                            <td>若干</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 text-center mb-4">
                    <div class="col-lg-12 mb-4">
                        <h4>台湾地区（学生）</h4>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">类项</th>
                            <th scope="col">奖金</th>
                            <th scope="col">数量</th>
                        </tr>
                        </thead>
                        <tbody class="table-borderless">
                        <tr>
                            <td>一等奖</td>
                            <td>10,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>二等奖</td>
                            <td>5,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>三等奖</td>
                            <td>3,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>入围奖</td>
                            <td>1,000</td>
                            <td>若干</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 text-center mb-4">
                    <div class="col-lg-12 mb-4">
                        <h4>海外地区（学生）</h4>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">类项</th>
                            <th scope="col">奖金</th>
                            <th scope="col">数量</th>
                        </tr>
                        </thead>
                        <tbody class="table-borderless">
                        <tr>
                            <td>一等奖</td>
                            <td>10,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>二等奖</td>
                            <td>5,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>三等奖</td>
                            <td>3,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>入围奖</td>
                            <td>1,000</td>
                            <td>若干</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 text-center mb-4">
                    <div class="col-lg-12 mb-4">
                        <h4>创新创业者（社会）</h4>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">类项</th>
                            <th scope="col">奖金</th>
                            <th scope="col">数量</th>
                        </tr>
                        </thead>
                        <tbody class="table-borderless">
                        <tr>
                            <td>一等奖</td>
                            <td>20,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>二等奖</td>
                            <td>10,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>三等奖</td>
                            <td>5,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>入围奖</td>
                            <td>1,000</td>
                            <td>若干</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-12 my-5">
                    <div class="award-begin text-center">
                        <h4>- 决赛 -</h4>
                    </div>
                </div>
                <div class="col-lg-6 text-center mb-4">
                    <div class="col-lg-12 mb-4">
                        <h4>综合奖（学生）</h4>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">类项</th>
                            <th scope="col">奖金</th>
                            <th scope="col">数量</th>
                        </tr>
                        </thead>
                        <tbody class="table-borderless">
                        <tr>
                            <td>金奖</td>
                            <td>30,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>银奖</td>
                            <td>20,000</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>铜奖</td>
                            <td>10,000</td>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>优胜奖</td>
                            <td>2,000</td>
                            <td>若干</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 text-center mb-4">
                    <div class="col-lg-12 mb-4">
                        <h4>单项奖（不分学生/社会）</h4>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">类项</th>
                            <th scope="col">奖金</th>
                            <th scope="col">数量</th>
                        </tr>
                        </thead>
                        <tbody class="table-borderless">
                        <tr>
                            <td>最具商业价值奖</td>
                            <td>10,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>最具技术挑战奖</td>
                            <td>10,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>最佳产品创意奖</td>
                            <td>10,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>最佳食物体验奖</td>
                            <td>10,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>最佳包装设计奖</td>
                            <td>10,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>最高人气奖</td>
                            <td>10,000</td>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>品牌联合奖（企业）</td>
                            <td>10,000</td>
                            <td>若干</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="campaign-notice">
        <div class="container">
            <div class="row mt-100 mb-100">
                <div class="notice-header col-lg-12 mb-5 text-center">
                    <h2>参赛须知</h2>
                </div>
                <div class="col-lg-6 mt-4">
                    <h4 class="pb-4 text-center">-  团队须知 -</h4>
                    <p>学生自行组队参赛，建议每队5人左右，8人为上限；</p>
                    <p>我们鼓励毕业5年内（包括5年）已经就业的企业人员参赛；</p>
                    <p>创新队长需要把控项目节奏和方向，承担一个项目中“项目经理”的角色，其他人员构成及队员职责确定根据课题需要，符合多岗位协同原则；</p>
                    <p>队员的组成考虑学科与专业的多样性，建议包括但不仅限于：食品类（食品工程、食品安全）、设计类（工业设计、平面设计、多媒体设计等）、商科类（市场营销、管理等）等相关专业的同学；</p>
                    <p>鼓励跨专业、跨院系甚至跨地区组队参赛团队；</p>
                    <p>每队可邀请2位指导老师，请学生团队根据项目方向，邀请消防老师，注意团队权益分配。</p>
                </div>
                <div class="col-lg-6 mt-4">
                    <h4 class="pb-4 text-center">-  参赛要求 -</h4>
                    <p>本着公平公正的态度，参与大赛者不得出现抄袭、仿冒、完善上届作品等违规参赛行为；</p>
                    <p>专业老师、超过5年的企业工作人员仅有辅导权力，不得邀请参与赛程中；</p>
                    <p>参与本次大赛的作品不可砖头其他同类型比赛，参赛团队必须通过官方唯一报名通道方可报名成功，请完整填写参赛信息；</p>
                    <p>参赛过程中，每阶段提交作品时间将严格把关，不得以硬盘损坏、没有网络、忘记保存等理由推迟作品提交；</p>
                    <p>作品提交材料务必完整，缺少提交材料者一律不予评进入审资格；</p>
                    <p>参赛作品不得有违反社会公德和社会公共利益等内容出现；</p>
                    <p>严重违反大赛章程和决定者大赛主委会有权利对其做退赛处理；</p>
                    <p>有任何意见和建议也欢迎通过大赛各个渠道及时沟通或进行咨询，工作人员会在工作日9:00 - 18:00之间做及时回复反馈。</p>
                    <p></p>
                </div>
            </div>
        </div>
    </section>
@stop
